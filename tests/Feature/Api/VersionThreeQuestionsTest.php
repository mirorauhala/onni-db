<?php

namespace Tests\Feature\Api;

use App\Category;
use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VersionThreeQuestionsTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test basic GET request.
     *
     * @return void
     */
    public function test_get_request()
    {
        $question = factory(Question::class)->create();

        $response = $this->json('GET', '/api/v3/question');

        $response->assertOk();
        $response->assertJsonFragment([
            'data' => [[
                'id' => $question->id,
                'question' => $question->question,
                'answer1' => $question->answer1,
                'answer2' => $question->answer2,
                'answer3' => $question->answer3,
                'answer4' => $question->answer4,
                'explanation' => $question->explanation,
                'difficulty' => $question->difficulty,
                'category' => [
                    'id' => $question->category->id,
                    'category' => $question->category->category,
                ],
                'created_at' => $question->created_at->format('d/m/Y H:i'),
                'updated_at' => $question->updated_at->format('d/m/Y H:i')
            ]]
        ]);
    }

    /**
     * Test request with difficulty. Make sure it won't output other questions
     * with different difficulties.
     *
     * @return void
     */
    public function test_difficulty_parameter()
    {
        $question = factory(Question::class)->create([
            'difficulty' => 1
        ]);

        $question2 = factory(Question::class)->create([
            'difficulty' => 2
        ]);

        $response = $this->json('GET', '/api/v3/question', ['difficulty' => 2]);

        $response->assertOk();
        $response->assertJsonMissing([
            'data' => [[
                'id' => $question->id,
                'question' => $question->question,
                'answer1' => $question->answer1,
                'answer2' => $question->answer2,
                'answer3' => $question->answer3,
                'answer4' => $question->answer4,
                'explanation' => $question->explanation,
                'difficulty' => $question->difficulty,
                'category' => [
                    'id' => $question->category->id,
                    'category' => $question->category->category,
                ],
                'created_at' => $question->created_at->format('d/m/Y H:i'),
                'updated_at' => $question->updated_at->format('d/m/Y H:i')
            ]]
        ]);

        $response->assertJsonFragment([
            'data' => [[
                'id' => $question2->id,
                'question' => $question2->question,
                'answer1' => $question2->answer1,
                'answer2' => $question2->answer2,
                'answer3' => $question2->answer3,
                'answer4' => $question2->answer4,
                'explanation' => $question2->explanation,
                'difficulty' => $question2->difficulty,
                'category' => [
                    'id' => $question2->category->id,
                    'category' => $question2->category->category,
                ],
                'created_at' => $question2->created_at->format('d/m/Y H:i'),
                'updated_at' => $question2->updated_at->format('d/m/Y H:i')
            ]]
        ]);
    }

    /**
     * Test request with category. Make sure it won't output other questions
     * with different categories.
     *
     * @return void
     */
    public function test_category_parameter()
    {
        $question = factory(Question::class)->create([
            'category_id' => factory(Category::class)->create([
                'category' => 'Testing',
            ])->id
        ]);

        $question2 = factory(Question::class)->create([
            'category_id' => factory(Category::class)->create([
                'category' => 'Testing 2',
            ])->id
        ]);

        $response = $this->json('GET', '/api/v3/question', ['category' => $question2->category_id]);

        $response->assertOk();
        $response->assertJsonMissing([
            'data' => [[
                'id' => $question->id,
                'question' => $question->question,
                'answer1' => $question->answer1,
                'answer2' => $question->answer2,
                'answer3' => $question->answer3,
                'answer4' => $question->answer4,
                'explanation' => $question->explanation,
                'difficulty' => $question->difficulty,
                'category' => [
                    'id' => $question->category->id,
                    'category' => $question->category->category,
                ],
                'created_at' => $question->created_at->format('d/m/Y H:i'),
                'updated_at' => $question->updated_at->format('d/m/Y H:i')
            ]]
        ]);

        $response->assertJsonFragment([
            'data' => [[
                'id' => $question2->id,
                'question' => $question2->question,
                'answer1' => $question2->answer1,
                'answer2' => $question2->answer2,
                'answer3' => $question2->answer3,
                'answer4' => $question2->answer4,
                'explanation' => $question2->explanation,
                'difficulty' => $question2->difficulty,
                'category' => [
                    'id' => $question2->category->id,
                    'category' => $question2->category->category,
                ],
                'created_at' => $question2->created_at->format('d/m/Y H:i'),
                'updated_at' => $question2->updated_at->format('d/m/Y H:i')
            ]]
        ]);
    }
}
