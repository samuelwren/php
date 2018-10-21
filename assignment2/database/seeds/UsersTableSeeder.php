<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Inserts data into User database
        DB::table('users')->insert([
            'firstName' => 'Bob',
            'lastName' => 'Fred',
            'email' => 'Bob@a.org',
            'dob' => '01/01/2000',
            'image' => 'http://a.fod4.com/images/GifGuide/landlord/you-need-to-relax.gif',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'Fred',
            'lastName' => 'Tim',
            'email' => 'Fred@a.org',
            'dob' => '01/01/2001',
            'image' => 'http://i.imgur.com/pGE8bPA.gif',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'Tim',
            'lastName' => 'Bob',
            'email' => 'Tim@a.org',
            'dob' => '01/01/2002',
            'image' => 'https://media4.giphy.com/media/l0HlSDOmtwYWfbpWU/giphy.gif',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'John',
            'lastName' => 'Jackson',
            'email' => 'John@a.org',
            'dob' => '01/01/1992',
            'image' => 'https://media.giphy.com/media/9xrgexjPlNdFS/giphy.gif',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'Tom',
            'lastName' => 'LeBlub',
            'email' => 'Tom@a.org',
            'dob' => '01/01/1972',
            'image' => 'https://media.giphy.com/media/79m40U0zaX56g/giphy.gif',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'Jeff',
            'lastName' => 'LeVioletRemuer',
            'email' => 'Jeff@a.org',
            'dob' => '01/06/0000',
            'image' => 'https://m.popkey.co/1edcf5/JmDbE.gif',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'Greg',
            'lastName' => 'LastName',
            'email' => 'Greg@a.org',
            'dob' => '01/06/0000',
            'image' => 'https://www.askideas.com/media/48/Donald-Trump-Wall-Cop-Funny-Donald-Trump-Meme-Image.jpg',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'Frank',
            'lastName' => 'Something',
            'email' => 'Frank@a.org',
            'dob' => '01/06/0000',
            'image' => 'http://cdn1-www.craveonline.com/assets/uploads/2016/08/man_file_1114550_1_mandatory_gifs_of_the_week_8_25_16.gif',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'Matthew',
            'lastName' => 'Yep',
            'email' => 'Matthew@a.org',
            'dob' => '01/06/0000',
            'image' => 'http://cdn2-www.craveonline.com/assets/mandatory/legacy/2016/08/man_file_1114550_4_mandatory_gifs_of_the_week_8_25_16.gif',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'Rickard',
            'lastName' => 'Winters',
            'email' => 'Rickard@a.org',
            'dob' => '01/06/0000',
            'image' => 'http://cdn1-www.craveonline.com/assets/mandatory/legacy/2016/08/man_file_1114550_6_mandatory_gifs_of_the_week_8_25_16.gif',
            'password' => bcrypt('1234'),
        ]);
    }
}
