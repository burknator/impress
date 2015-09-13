<?php

use Illuminate\Database\Seeder;
use Impress\Author;

class AuthorsSeeder extends Seeder
{
    public function run()
    {
        DB::table('authors')->delete();
        Author::create(['email' => 'hi@pburke.de', 'password' => 'test']);
    }
}
