<?php

use Illuminate\Database\Seeder;

class PrivaciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        DB::table('privacies')->insert ([
            'privacySetting' => 'Public'
        ]);
        DB::table('privacies')->insert ([
            'privacySetting' => 'Friends'
        ]);
        DB::table('privacies')->insert ([
            'privacySetting' => 'Private'
        ]);
    }
}
