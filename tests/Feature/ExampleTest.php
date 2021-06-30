<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_not_login_user_cant_access_home()
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }
}
