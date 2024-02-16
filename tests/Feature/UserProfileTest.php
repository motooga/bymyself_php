<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user, 'user')
            ->get('user/profile');

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user,'user')
            ->from('user/profile')
            ->patch('user/profile', [
                'nickname' => 'Test User',
                'login_id' => 'test_id',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('user/profile');

        $user->refresh();

        $this->assertSame('Test User', $user->nickname);
        $this->assertSame('test_id', $user->login_id);

    }

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user,'user')
            ->from('user/profile')
            ->patch('user/profile', [
                'nickname' => 'Test User',
                'login_id' => $user->login_id,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('user/profile');


    }

    public function test_user_can_delete_their_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user,'user')
            ->from('user/profile')
            ->delete('user/profile', [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user,'user')
            ->from('user/profile')
            ->delete('user/profile', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrors('password')
            ->assertRedirect('user/profile');

        $this->assertNotNull($user->fresh());
    }
}
