<?php

use Illuminate\Database\Seeder;
use Impress\Type;

class TypesSeeder extends Seeder
{
    public function run()
    {
        DB::table('types')->delete();

        Type::create(['name' => 'post', 'sort' => 1]);
        Type::create(['name' => 'page', 'sort' => 2]);
    }
}
