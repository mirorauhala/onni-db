<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

/* Laravel authentication routes */
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

/* List questions */
Route::get('/', 'Questions\QuestionController@index')->name('question.all');

// New question
Route::get('/new', 'Questions\QuestionController@new')->name('question.new');
Route::post('/new', 'Questions\QuestionController@store');

// Edit question
Route::get('/edit/{question}', 'Questions\QuestionController@edit')->name('question.edit');
Route::post('/edit/{question}', 'Questions\QuestionController@update');

// Delete question
Route::get('/delete/{question}', 'Questions\QuestionController@delete')->name('question.delete');
Route::post('/delete/{question}', 'Questions\QuestionController@destroy');

/* List categories */
Route::get('/category', 'Categories\CategoryController@index')->name('category.all');

// New category
Route::get('/category/new', 'Categories\CategoryController@new')->name('category.new');
Route::post('/category/new', 'Categories\CategoryController@store');

// Edit category
Route::get('/category/edit/{question}', 'Categories\CategoryController@edit')->name('category.edit');
Route::post('/category/edit/{question}', 'Categories\CategoryController@update');

// Delete category
Route::get('/category/delete/{question}', 'Categories\CategoryController@delete')->name('category.delete');
Route::post('/category/delete/{question}', 'Categories\CategoryController@destroy');

Route::prefix('/settings')->group(function() {
    Route::get('/', 'Settings\SettingsController@show')->name('settings');
    
    Route::get('/account', 'Settings\SettingsAccountController@show')->name('settings.account');
    Route::post('/account', 'Settings\SettingsAccountController@update');

    Route::get('/password', 'Settings\SettingsPasswordController@show')->name('settings.password');
    Route::post('/password', 'Settings\SettingsPasswordController@update');
});
