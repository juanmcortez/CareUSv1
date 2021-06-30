<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'last_name' => 'Test',
            'first_name' => 'User',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();

        // first time login after register goes to profile
        $response->assertRedirect(route('user.profile'));
    }
}
