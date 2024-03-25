<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    public function definition(): array
    {

        return [
            'autor' => fake()->name(),
            'titulo' => fake()->name(),
            'spinoff' => fake()->text(200),
            'user_id' => '1',
            'capa' => 'https://www.gravatar.com/avatar/' . md5(Str::uuid())
        ];
    }
}
