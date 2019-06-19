<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question',
        'difficulty',
        'explanation',
        'is_enabled',
        'answer1',
        'answer2',
        'answer3',
        'answer4'
    ];

    /**
     * Define a relationship between Category and Question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
