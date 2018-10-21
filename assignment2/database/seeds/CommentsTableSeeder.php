<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Inserts data into Comments Database
        DB::table('comments')->insert ([
            'comment' => 'Testing',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 2',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 3',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 4',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 5',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 6',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 7',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 8',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 9',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 10',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 11',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 12',
            'post_id' => '1',
            'user_id' => '1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing-3',
            'post_id' => '2',
            'user_id' => '3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing',
            'post_id' => '7',
            'user_id' => '10',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 2',
            'post_id' => '7',
            'user_id' => '4',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 3',
            'post_id' => '7',
            'user_id' => '5',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 4',
            'post_id' => '7',
            'user_id' => '6',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 5',
            'post_id' => '7',
            'user_id' => '6',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 6',
            'post_id' => '7',
            'user_id' => '3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 7',
            'post_id' => '7',
            'user_id' => '4',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 8',
            'post_id' => '7',
            'user_id' => '10',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 9',
            'post_id' => '7',
            'user_id' => '9',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert ([
            'comment' => 'Testing 10',
            'post_id' => '7',
            'user_id' => '2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
