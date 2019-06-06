<?php

namespace Tests\Feature;

use App\{Category, User, Question};
use Tests\TestCase;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuestionDeleteTest extends TestCase
{
    use DatabaseMigrations;

    protected $payload;
    protected $user;
    protected $category;

    public function setUp() : void {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->question = factory(Question::class)->create();
    }

    /**
     * Test user can delete a question.
     *
     * @return void
     */
    public function test_user_can_delete_question()
    {
        $response = $this->actingAs($this->user)->post(route('question.destroy', ['question' => $this->question]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('questions', Arr::except($this->question->toArray(), ['category']));
    }
}
