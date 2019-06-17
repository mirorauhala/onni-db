<?php

namespace App\Http\Controllers\Questions;

use App\Category;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionStoreRequest;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List all questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questions.index');
    }

    /**
     * Show view for adding new questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('questions.create')
            ->with([
                'categories' => $categories
            ]);
    }

    /**
     * Store new question.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionStoreRequest $request)
    {
        $question = $this->store_question($request);

        return redirect()
            ->route('question.all')
            ->with([
                'status' => 200,
                'message' => 'Question added'
            ]);
    }

    /**
     * Edit questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Request $request)
    {
        $categories = Category::all();

        return view('questions.edit')
            ->with([
                'question' => $question,
                'categories' => $categories,
                'answer1' => $question->answer1,
                'answer2' => $question->answer2,
                'answer3' => $question->answer3,
                'answer4' => $question->answer4,
            ]);
    }

    /**
     * Update questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Request $request)
    {
        $this->validate($request, [
            'category' => 'required|min:1',
            'question' => 'required|min:1',
            'difficulty' => 'required|between:1,3',
            'explanation' => 'required|min:1',
            'answer1' => 'required|min:1',
            'answer2' => 'required|min:1',
            'answer3' => 'required|min:1',
            'answer4' => 'required|min:1',
        ]);

        $this->update_question($question, $request);

        return redirect()
            ->route('question.edit', ['question' => $question->id])
            ->with([
                'status' => 200,
                'message' => 'Question updated',
                'question' => $question,
                'answer1' => $request->answer1,
                'answer2' => $request->answer2,
                'answer3' => $request->answer3,
                'answer4' => $request->answer4,
            ]);
    }

    /**
     * Delete question.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Question $question, Request $request)
    {
        return view('questions.delete')
            ->with([
                'question' => $question
            ]);
    }

    /**
     * Delete question.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Request $request)
    {
        Question::destroy($question);
        return redirect()
            ->route('question.all')
            ->with([
                'status' => 200,
                'message' => 'Question deleted'
            ]);
    }

    /**
     * Store new questions.
     *
     * @return App\Question
     */
    protected function store_question(Request $request)
    {
        $category = Category::find($request->category);

        $question = $category
            ->questions()
            ->save(new Question([
                'question' => $request->question,
                'difficulty' => $request->difficulty,
                'explanation' => $request->explanation,
                'is_enabled' => $request->question_enabled == 1,
                'answer1' => $request->answer1,
                'answer2' => $request->answer2,
                'answer3' => $request->answer3,
                'answer4' => $request->answer4,
            ]));

        return $question;
    }

    /**
     * Update questions.
     *
     * @return App\Question
     */
    protected function update_question($question, Request $request)
    {
        $question->category_id = $request->category;
        $question->question = $request->question;
        $question->difficulty = $request->difficulty;
        $question->explanation = $request->explanation;
        $question->is_enabled = $request->question_enabled == 1;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->answer3 = $request->answer3;
        $question->answer4 = $request->answer4;
        $question->save();

        return $question;
    }
}
