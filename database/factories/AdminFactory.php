<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition(): array
    {
        return [
            'user_name' => $this->faker->unique()->userName(),
            'password' => Hash::make('password'),
            'type' => 'admin_panel',
            'branch_id' => 1,
        ];
    }
}
