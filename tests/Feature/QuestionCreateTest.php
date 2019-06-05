<?php

namespace Tests\Feature;

use App\{Category, User};
use Tests\TestCase;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuestionCreateTest extends TestCase
{
    /**
     * Test user can create a question.
     *
     * @return void
     */
    public function test_user_can_create_question()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $payload = [
            'category' => $category->id,
            'question' => 'This is a question?',
            'difficulty' => 1,
            'explanation' => 'This is the explanation.',
            'answer1' => 'This is the answer one.',
            'answer2' => 'This is the answer two.',
            'answer3' => 'This is the answer three.',
            'answer4' => 'This is the answer four.'
        ];

        $response = $this->actingAs($user)->post(route('question.store'), $payload);

        $response->assertStatus(302);
        $this->assertDatabaseHas('questions', Arr::except($payload, ['category']));
    }

    /**
     * Test user can create a question.
     *
     * @return void
     */
    public function test_question_needs_category()
    {
        $user = factory(User::class)->create();

        $payload = [
            'category' => null,
            'question' => 'This is a question?',
            'difficulty' => 1,
            'explanation' => 'This is the explanation.',
            'answer1' => 'This is the answer one.',
            'answer2' => 'This is the answer two.',
            'answer3' => 'This is the answer three.',
            'answer4' => 'This is the answer four.'
        ];

        $response = $this->actingAs($user)->post(route('question.store'), $payload);

        $response->assertStatus(302);
        $this->assertDatabaseHas('questions', Arr::except($payload, ['category']));
    }
}
