<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContentsControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testStoreNewContent()
    {
        $slug = $this->faker->word;

        $this->login()
             ->visit(route('i.contents.create'))
             ->type($this->faker->word, 'title')
             ->type($slug, 'slug')
             ->type($this->faker->paragraph, 'text')
             ->press('Submit')
             ->seePageIs(route('i.contents.edit', ['contents' => $slug]));
    }
}
