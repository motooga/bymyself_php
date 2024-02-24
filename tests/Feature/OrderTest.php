<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Family;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_page_is_displayed(): void
    {
        $user = Family::factory()->create();

        $response = $this
            ->actingAs($user, 'order')
            ->get('order/create');

        $response->assertOk();
    }

    public function test_order_can_create(): void
    {
        $user = Family::factory()->create();

        $response = $this
            ->actingAs($user,'order')
            ->from('order/create')
            ->post('order/create', [
                'task_id' => '1',
                'user_id' => '1',
                'set_point' => '500',
                'start_date' => '2024/2/1',
                'end_date' => '2024/2/1',
                'family_id' => '3',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('user/show/1');

        $user->refresh();

        $this->assertSame('Test User', $user->nickname);
        $this->assertSame('test_id', $user->login_id);

    }

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = Family::factory()->create();

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
        $user = Family::factory()->create();

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
        $user = Family::factory()->create();

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
