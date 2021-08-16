<?php

namespace Database\Factories;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'booking_status' => $this->faker->randomElement([true,false]),
            'price' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 10000, $max = NULL),
            'location' => $this->faker->streetAddress(),
            'longitude' =>  $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 23, $max = 64),
            'latitude' =>  $this->faker->randomFloat($nbMaxDecimals = NULL, $min = -10, $max = 16),
            'date' => Carbon::now(),
            'time' => Carbon::now(),
            'mother_id' => $this->faker->randomDigitNotZero(),
            'midwife_id' =>  $this->faker->randomDigitNotZero()

        ];
    }
}
