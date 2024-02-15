<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Family;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $family = Family::factory()->create();
        return [
            'nickname' => $this->faker->name(),
            'login_id' => $this->faker->unique()->word(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'family_id' => $family->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */

}