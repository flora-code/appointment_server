<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'appointment_id'=>$this->faker->randomDigitNotZero(0),
            'status_disbursement'=>$this->faker->randomElement($array = array ('Collected','Not Collected','Rejected')), 
            
        
        ];
    }
}
