<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        DB::table('products')->insert ([
            'name' => 'iPhone 6',
            'price' => '600',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert ([
            'name' => 'iPad',
            'price' => '350',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert ([
            'name' => 'Galaxy S6',
            'price' => '600',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert ([
            'name' => 'Laptop',
            'price' => '849',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
