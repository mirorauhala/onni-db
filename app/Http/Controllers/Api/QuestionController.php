<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\QuestionIndexRequest;
use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;

class QuestionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Requests\QuestionIndexRequest
     */
    public function index(QuestionIndexRequest $request)
    {
        $questions = Question::when($request->category, function($query) use ($request) {
            $query->where('category_id', $request->category);
        });

        $questions->when($request->difficulty, function($query) use ($request) {
            $query->where('difficulty', $request->difficulty);
        });

        $questions->when(
            $request->random,
            function($query) use ($request) {
                $query->inRandomOrder();
            },
            function($query) {
                $query->orderBy('updated_at', 'DESC');
            }
        );

        return QuestionResource::collection($questions->paginate(30));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\QuestionStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionStoreRequest $request)
    {
        $question = Question::create([
            'question' => $request->question,
            'difficulty' => $request->difficulty,
            'explanation' => $request->explanation,
            'category_id' => $request->category_id,
            'is_enabled' => $request->question_enabled == 1,
            'answer1' => $request->answer1,
            'answer2' => $request->answer2,
            'answer3' => $request->answer3,
            'answer4' => $request->answer4,
        ]);

        return $question;
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return $question;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, Question $question)
    {
        $question->update([
            'question' => $request->question,
            'difficulty' => $request->difficulty,
            'explanation' => $request->explanation,
            'category_id' => $request->category_id,
            'is_enabled' => $request->question_enabled == 1,
            'answer1' => $request->answer1,
            'answer2' => $request->answer2,
            'answer3' => $request->answer3,
            'answer4' => $request->answer4,
        ]);

        return $question;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Question  $question
     * @return array
     */
    public function destroy(Question $question)
    {
        $question->destroy();

        return ['status' => 'true'];
    }
}
