<?php

namespace Tests\Feature\UserAuth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('user/login');

        $response->assertStatus(200);
    }
    public function test_unauthenticated_user_cannot_view_dashboard(): void
    {
        $response = $this->get('user/dashboard');
 
        $response->assertRedirect('user/login');
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();
        $this->assertGuest('user');
        $response = $this->post('user/login', [
            'login_id' => $user->login_id,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('user');
        $response->assertRedirect(RouteServiceProvider::USER_HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();
        $this->assertGuest('user');
        $this->post('user/login', [
            'login_id' => $user->login_id,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('user');
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'user')->post('user/logout');

        $this->assertGuest('user');
        $response->assertRedirect('user/login');
    }
}
