<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo'     => $this->faker->sentence,
            'descripcion_rapida'      => $this->faker->text(40),
            'descripcion'      => $this->faker->text(400),
            'objetivo'      => $this->faker->numberBetween($min=1, $max=3),
            'prioridad'      => $this->faker->numberBetween($min=1, $max=5),
            'autor'      => $this->faker->name(),            
        ];
    }
}
