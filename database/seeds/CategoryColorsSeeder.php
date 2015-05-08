<?php

use Illuminate\Database\Seeder;
use Impress\CategoryColor;

class CategoryColorsSeeder extends Seeder {
    public function run()
    {
        DB::table('category_colors')->delete();

        CategoryColor::create(['hex' => 'ff0000']);
        CategoryColor::create(['hex' => '00ff00']);
        CategoryColor::create(['hex' => '0000ff']);
    }
}