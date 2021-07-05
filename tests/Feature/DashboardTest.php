<?php

namespace Tests\Feature;

use App\Models\Users\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * Dashboard can't be accessed if not loged in.
     *
     * @return void
     */
    public function test_not_login_user_cant_access_home()
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }


    /**
     * After login redirect to dashboard
     *
     * @return void
     */
    public function test_users_can_authenticate_and_redirects_to_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
