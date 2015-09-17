<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoriesControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testStoreNewAuthor()
    {
        $password = $this->faker->password;

        $this->login()
             ->visit(route('i.authors.create'))
             ->type($this->faker->email, 'email')
             ->type($password, 'password')
             ->type($password, 'password_confirmation')
             ->press('Save')
             ->seePageIs(route('i.authors.edit', ['authors' => $slug]));
    }
}
