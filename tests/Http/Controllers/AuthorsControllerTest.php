<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorsControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testStoreNewAuthor()
    {
        $email = $this->faker->email;
        $password = $this->faker->password;

        $this->login()
             ->visit(route('i.authors.create'))
             ->type($email, 'email')
             ->type($password, 'password')
             ->type($password, 'password_confirmation')
             ->press('Save')
             ->see($email);
    }
}
