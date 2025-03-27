<?php

namespace Database\Seeders;

use App\Models\Classrooms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classrooms::factory(100)->create();
    }
}
