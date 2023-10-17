<?php

namespace notenest\notenest\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use notenest\notenest\Models\status_func;
use notenest\notenest\traits\status;

class statusFactory extends Factory
{
    protected $model = status_func::class;

    public function definition()
    {
        return [
            'function_name' => 'first function',
            'description' => fake()->sentence(),
            'status' => status::$AWAIT,
        ];

    }
}
