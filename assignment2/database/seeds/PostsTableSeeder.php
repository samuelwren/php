<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    function run() {
        // Inserts data into Posts database
        DB::table('posts')->insert ([
            'title' => 'Testing-Bob',
            'message' => 'Testing-Bob-Message',
            'user_id' => '1',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Testing-Fred',
            'message' => 'Testing-Fred-Message',
            'user_id' => '2',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Testing-Tim',
            'message' => 'Testing-Tim-Message',
            'user_id' => '3',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Bobs Post 1',
            'message' => 'Bobs 1 post',
            'user_id' => '1',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Bobs Post 2',
            'message' => 'Bobs 2 post',
            'user_id' => '1',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Bobs Post 3',
            'message' => 'Bobs Private Post',
            'user_id' => '1',
            'privacy_id' => '3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Chicken',
            'message' => 'Chicken Butter',
            'user_id' => '4',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Bacon',
            'message' => 'Bacon and Eggs',
            'user_id' => '4',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Pointless',
            'message' => '3rd',
            'user_id' => '4',
            'privacy_id' => '3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => '4th Post',
            'message' => 'Number 4',
            'user_id' => '4',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => '5th Post',
            'message' => 'Number 5',
            'user_id' => '4',
            'privacy_id' => '3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Still does not make sense',
            'message' => '10 posts for one person is weird',
            'user_id' => '4',
            'privacy_id' => '3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Testing???',
            'message' => '10 posts to test?',
            'user_id' => '4',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => '8th',
            'message' => '8th',
            'user_id' => '4',
            'privacy_id' => '3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => '9th',
            'message' => '9th',
            'user_id' => '4',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Finished',
            'message' => 'This is the 10th post',
            'user_id' => '4',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Tom Public',
            'message' => 'Public message',
            'user_id' => '5',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Tom Friend',
            'message' => 'Friend message',
            'user_id' => '5',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Jeff Public',
            'message' => 'Public message',
            'user_id' => '6',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Jeff Friend',
            'message' => 'Friend message',
            'user_id' => '6',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Greg Public',
            'message' => 'Public message',
            'user_id' => '7',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Greg Friend',
            'message' => 'Friend message',
            'user_id' => '7',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Frank Public',
            'message' => 'Public message',
            'user_id' => '8',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Frank Friend',
            'message' => 'Friend message',
            'user_id' => '8',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Matthew Public',
            'message' => 'Public message',
            'user_id' => '9',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Matthew Friend',
            'message' => 'Friend message',
            'user_id' => '9',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Rickard Public',
            'message' => 'Public message',
            'user_id' => '10',
            'privacy_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert ([
            'title' => 'Rickard Friend',
            'message' => 'Friend message',
            'user_id' => '10',
            'privacy_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
