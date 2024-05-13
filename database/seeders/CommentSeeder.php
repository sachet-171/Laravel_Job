<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get IDs of users with the "user" role
        $userIds = User::where('role', 'user')->pluck('id');

        // Create 10 comments for each user
        foreach ($userIds as $userId) {
            for ($i = 0; $i < 10; $i++) {
                DB::table('comments')->insert([
                    'user_id' => $userId,
                    'comment' => 'This is comment number ' . ($i + 1) . ' for user ' . $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
