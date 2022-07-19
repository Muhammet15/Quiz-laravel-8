<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Answer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Answer::class;
    public function definition()
    {
        return [
            'user_id'=>rand(1,10),
            'question_id'=>rand(1,100),
            'answer'=>'answer'.rand(1,4)
        ];
    }
}
