<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        return [
            'task_id' => 1,
            'user_id' => $user->id,
            'set_point' => 500,
            'start_date' => '2024/2/1',
            'end_date' => '2024/2/1',
            'family_id' => $user -> family_id,
        ];
    }
}
