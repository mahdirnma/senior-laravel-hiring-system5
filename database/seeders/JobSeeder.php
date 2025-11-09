<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::create([
            'title' => 'job 1',
            'description' => 'lorem ipsum 1',
            'salary' => '24000',
            'working_hours' => '40',
            'working_days' => '5',
            'department' => 'technical_team',
            'type' => 'remote',
            'company_id' => '1',
        ]);
        Job::create([
            'title' => 'job 2',
            'description' => 'lorem ipsum 2',
            'salary' => '32000',
            'working_hours' => '40',
            'working_days' => '5',
            'department' => 'administration_department',
            'type' => 'hybrid',
            'company_id' => '2',
        ]);
        Job::create([
            'title' => 'job 3',
            'description' => 'lorem ipsum 3',
            'salary' => '60000',
            'working_hours' => '40',
            'working_days' => '5',
            'department' => 'training_department',
            'type' => 'in person',
            'company_id' => '1',
        ]);

    }
}
