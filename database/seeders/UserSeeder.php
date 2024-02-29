<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = \App\Models\User::inRandomOrder()->first(); // Retrieve a random user
            User::create([
                'name' => 'Dummy User ' . $i,
                'email' => 'dummyemail' . $i . '@gmail.com',
                'user_type' => 'customer',
                'password' => Hash::make('1234'), 
                'profile' => 'https://dummyimage.com/200x200/000/fff',
            ]);
        }

        for ($i = 1; $i <= 50; $i++) {
            $user = \App\Models\User::inRandomOrder()->first(); // Retrieve a random user
            Category::create([
                'user_id' => $user->id,
                'name' => 'Category ' . $i,
            ]);
        }
    }

}
