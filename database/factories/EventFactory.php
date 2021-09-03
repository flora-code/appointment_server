<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(6),
            'featured_image' => $this->faker->imageUrl(),
            'category' => $this->faker->word,
            'date' => '12/08/1943',
            'time' => '16:00',
            'location' => $this->faker->address(),
        ];
    }
}
