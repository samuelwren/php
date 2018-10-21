<?php

use Illuminate\Database\Seeder;

class FriendsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Inserts data into Friends database
        DB::table('friends')->insert([
            'id' => '1',
            'user_id' => '1',
            'friend_id' => '2',
        ]);
        DB::table('friends')->insert([
            'id' => '2',
            'user_id' => '1',
            'friend_id' => '3',
        ]);
        DB::table('friends')->insert([
            'id' => '3',
            'user_id' => '1',
            'friend_id' => '4',
        ]);
        DB::table('friends')->insert([
            'id' => '4',
            'user_id' => '2',
            'friend_id' => '3',
        ]);
        DB::table('friends')->insert([
            'id' => '5',
            'user_id' => '2',
            'friend_id' => '4',
        ]);
        DB::table('friends')->insert([
            'id' => '6',
            'user_id' => '2',
            'friend_id' => '5',
        ]);
        DB::table('friends')->insert([
            'id' => '7',
            'user_id' => '3',
            'friend_id' => '5',
        ]);
        DB::table('friends')->insert([
            'id' => '8',
            'user_id' => '4',
            'friend_id' => '5',
        ]);
    }
}
