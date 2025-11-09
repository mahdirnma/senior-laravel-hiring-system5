<?php

namespace Database\Seeders;

use App\Models\Applicant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Applicant::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('123'),
        ]);
        Applicant::create([
            'name' => 'reza',
            'email' => 'reza@gmail.com',
            'password' => Hash::make('123'),
        ]);

    }
}
