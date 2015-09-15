<?php

use Impress\CategoryColor;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoriesControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testStoreNewCategory()
    {
        $slug = $this->faker->word;

        $this->login()
             ->visit(route('i.categories.create'))
             ->type($this->faker->word, 'name')
             ->type($slug, 'slug')
             ->select(array_rand(CategoryColor::flatList()), 'color_id')
             ->press('Save')
             ->seePageIs(route('i.categories.edit', ['categories' => $slug]));
    }
}
