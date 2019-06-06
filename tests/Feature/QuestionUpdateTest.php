<?php

namespace Tests\Feature;

use App\{Category, User, Question};
use Tests\TestCase;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuestionUpdateTest extends TestCase
{
    use DatabaseMigrations;

    protected $payload;
    protected $user;
    protected $category;

    public function setUp() : void {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->category = factory(Category::class)->create();
        $this->question = factory(Question::class)->create();
        $this->payload = [
            'category' => $this->category->id,
            'question' => 'This is a question?',
            'difficulty' => 1,
            'explanation' => 'This is the explanation.',
            'answer1' => 'This is the answer one.',
            'answer2' => 'This is the answer two.',
            'answer3' => 'This is the answer three.',
            'answer4' => 'This is the answer four.'
        ];
    }

    /**
     * Test user can create a question.
     *
     * @return void
     */
    public function test_user_can_edit_question()
    {
        $response = $this->actingAs($this->user)->post(route('question.update', ['question' => $this->question]), $this->payload);

        $response->assertStatus(302);
        $this->assertDatabaseHas('questions', Arr::except($this->payload, ['category']));
    }

    /**
     * Category is a required field.
     *
     * @return void
     */
    public function test_question_needs_category()
    {
        $payload = Arr::except($this->payload, ['category']);

        $response = $this->actingAs($this->user)->post(route('question.update', ['question' => $this->question]), $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('category');
        $this->assertDatabaseMissing('questions', $payload);
    }

    /**
     * Question is a required field.
     *
     * @return void
     */
    public function test_question_needs_question()
    {
        $payload = Arr::except($this->payload, ['question']);

        $response = $this->actingAs($this->user)->post(route('question.update', ['question' => $this->question]), $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('question');
        $this->assertDatabaseMissing('questions', Arr::except($payload, ['category']));
    }

    /**
     * Difficulty is a required field.
     *
     * @return void
     */
    public function test_question_needs_difficulty()
    {
        $payload = Arr::except($this->payload, ['explanation']);

        $response = $this->actingAs($this->user)->post(route('question.update', ['question' => $this->question]), $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('explanation');
        $this->assertDatabaseMissing('questions', Arr::except($payload, ['category']));
    }

    /**
     * Explanation is a required field.
     *
     * @return void
     */
    public function test_question_needs_explanation()
    {
        $payload = Arr::except($this->payload, ['explanation']);

        $response = $this->actingAs($this->user)->post(route('question.update', ['question' => $this->question]), $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('explanation');
        $this->assertDatabaseMissing('questions', Arr::except($payload, ['category']));
    }

    /**
     * Answer1 is a required field.
     *
     * @return void
     */
    public function test_question_needs_answer1()
    {
        $payload = Arr::except($this->payload, ['answer1']);

        $response = $this->actingAs($this->user)->post(route('question.update', ['question' => $this->question]), $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('answer1');
        $this->assertDatabaseMissing('questions', Arr::except($payload, ['category']));
    }

    /**
     * Answer2 is a required field.
     *
     * @return void
     */
    public function test_question_needs_answer2()
    {
        $payload = Arr::except($this->payload, ['answer2']);

        $response = $this->actingAs($this->user)->post(route('question.update', ['question' => $this->question]), $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('answer2');
        $this->assertDatabaseMissing('questions', Arr::except($payload, ['category']));
    }

    /**
     * Answer3 is a required field.
     *
     * @return void
     */
    public function test_question_needs_answer3()
    {
        $payload = Arr::except($this->payload, ['answer3']);

        $response = $this->actingAs($this->user)->post(route('question.update', ['question' => $this->question]), $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('answer3');
        $this->assertDatabaseMissing('questions', Arr::except($payload, ['category']));
    }

    /**
     * Answer4 is a required field.
     *
     * @return void
     */
    public function test_question_needs_answer4()
    {
        $payload = Arr::except($this->payload, ['answer4']);

        $response = $this->actingAs($this->user)->post(route('question.update', ['question' => $this->question]), $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('answer4');
        $this->assertDatabaseMissing('questions', Arr::except($payload, ['category']));
    }
}
