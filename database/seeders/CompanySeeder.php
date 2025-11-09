<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'title' => 'company 1',
            'description' => 'lorem ipsum 1',
            'address' => 'company address 1',
        ]);
        Company::create([
            'title' => 'company 2',
            'description' => 'lorem ipsum 2',
            'address' => 'company address 2',
        ]);

    }
}
