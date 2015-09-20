<?php

use Impress\TagColor;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TagsControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testStoreNewTag()
    {
        $slug = $this->faker->word;

        $this->login()
             ->visit(route('i.tags.create'))
             ->type($this->faker->word, 'name')
             ->type($slug, 'slug')
             ->select(array_rand(TagColor::flatList()), 'color_id')
             ->press('Save')
             ->seePageIs(route('i.tags.edit', ['tags' => $slug]));
    }
}
