<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Midwife;
use App\Models\Mother;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Appointment::factory(100)->create();
        Midwife::factory(10)->create();
        Mother::factory(10)->create(); 
        Payment::factory(50)->create();
        User::factory(20)->create();

    }
}
