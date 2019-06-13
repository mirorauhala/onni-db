<?php

namespace App\Http\Controllers\Api;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'category' => 'nullable|exists:categories,id',
            'difficulty' => 'nullable|integer|between:1,3',
            'random' => 'nullable|boolean'
        ]);

        $questions = Question::when($request->category, function($query) use ($request) {
            $query->where('category_id', $request->category);
        });

        $questions = Question::when($request->difficulty, function($query) use ($request) {
            $query->where('difficulty', $request->difficulty);
        });

        $questions->when($request->random, function($query) use ($request) {
            $query->inRandomOrder();
        });

        return QuestionResource::collection($questions->paginate(30));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
