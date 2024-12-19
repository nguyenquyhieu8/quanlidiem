<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Province;



class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('123456'),
            'address' => $this->faker->address,
            'role_id' => rand(1,2),
            'is_active' => 1,
            'position' => "quản trị",
        ];
    }
}
