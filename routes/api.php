<?php

use Illuminate\Http\Request;

/**
 * For documentation see README.md and ./docs
 */

Route::prefix('v1')->group(function () {
    Route::get('questionId/{difficulty}/{category}', 'Endpoints\EndpointOne@getQuestionId')->name('api.v1.getQuestionId');
    Route::get('question/{question}', 'Endpoints\EndpointOne@getQuestion')->name('api.v1.getQuestion');
    Route::get('answer/{question}/{number}', 'Endpoints\EndpointOne@getAnswer')->name('api.v1.getAnswer');
    Route::get('explanation/{question}', 'Endpoints\EndpointOne@getExplanation')->name('api.v1.getExplanation');
});

Route::prefix('v2')->group(function () {
    Route::get('question', 'Endpoints\EndpointTwo@getQuestion')->name('api.v2.getQuestion');
});
