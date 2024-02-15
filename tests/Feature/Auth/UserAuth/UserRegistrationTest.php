<?php

namespace Tests\Feature\UserAuth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Family;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('user/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $family = Family::factory()->create();
        $response = $this
        ->actingAs($family)   
        ->post('user/register', [
            'nickname' => 'Test User',
            'login_id' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'family_id' => $family ->id,
        ]);


        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
