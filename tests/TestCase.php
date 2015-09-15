<?php

use Impress\Author;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{

    protected $baseUrl = 'http://localhost';

    protected $faker;

    public function setUp()
    {
        parent::setUp();

        $this->faker = Faker\Factory::create();
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

    /**
     * Login as a fake Author.
     */
    public function login()
    {
        return $this->actingAs(factory(Author::class)->create());
    }
}
