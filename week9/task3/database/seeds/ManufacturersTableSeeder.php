<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('manufacturers')->insert ([
            'name' => 'Apple Store'
        ]);
        DB::table('manufacturers')->insert ([
            'name' => 'Samsung'
        ]);
        DB::table('manufacturers')->insert ([
            'name' => 'Windows'
        ]);
    }
}
