<?php

namespace Database\Factories;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuizFactory extends Factory
{
    protected $model = Quiz::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3,7));
        return [
            'title'=>$title,
            'slug'=>Str::slug($title),
            'description'=>$this->faker->text(200)
        ];
    }
}
