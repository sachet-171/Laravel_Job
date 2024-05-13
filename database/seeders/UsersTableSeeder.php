<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin', 
            'email' => 'admin@laraveljobs-app.com', 
            'password' => Hash::make('superuser1234'),
            'role' => 'admin',
            'status' => 'active'
        ]);
         // Seed additional users
         $usersData = [
            [
                'name' => 'User 1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => 'active'
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => 'active'
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => 'active'
            ],
            [
                'name' => 'User 4',
                'email' => 'user4@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => 'active'
            ],
        ];

        // Insert multiple users
        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}