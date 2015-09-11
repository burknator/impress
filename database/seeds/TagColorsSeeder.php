<?php

use Illuminate\Database\Seeder;
use Impress\TagColor;

class TagColorsSeeder extends Seeder {
    public function run()
    {
        DB::table('tag_colors')->delete();

        TagColor::create(['hex' => 'ff0000']);
        TagColor::create(['hex' => '00ff00']);
        TagColor::create(['hex' => '0000ff']);
    }
}