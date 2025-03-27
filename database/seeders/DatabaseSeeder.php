<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory(100)->create();
        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'King',
            'email' => 'a@a.a',
            'password' => bcrypt('qwerty123'),
        ]);
        $this->call(SchoolsSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(NewsletterSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(ClassesSeeder::class);
        $this->call(ClassroomsSeeder::class);
        $this->call(SubjectsSeeder::class);


    }
}
