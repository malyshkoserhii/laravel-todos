<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $gandalf = User::factory()->create([
            'first_name' => 'Gandalf',
            'last_name' => 'the Grey',
            'email' => 'gandalf@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $frodo = User::factory()->create([
            'first_name' => 'Frodo',
            'last_name' => 'Baggins',
            'email' => 'frodo@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $aragorn = User::factory()->create([
            'first_name' => 'Aragorn',
            'last_name' => 'son of Arathorn',
            'email' => 'aragorn@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $gandalfTodo = Todo::factory()->create([
            'title' => 'Visit Frodo',
            'description' => 'Tell about the dangers of the One Ring',
            'completed' => true,
            'user_id' => $gandalf->id,
        ]);

        $frodoTodo = Todo::factory()->create([
            'title' => 'Find First Task',
            'description' => 'Find Aragorn and ask him for help',
            'completed' => false,
            'user_id' => $frodo->id,
        ]);

        $aragornTodo = Todo::factory()->create([
            'title' => 'Aragorn First Task',
            'description' => 'Meet Frodo',
            'completed' => false,
            'user_id' => $aragorn->id,
        ]);
    }
}
