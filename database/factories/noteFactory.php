<?php

namespace notenest\notenest\Database\Factories;

use ENUM\STATUS;
use Illuminate\Database\Eloquent\Factories\Factory;
use notenest\notenest\Models\note;

class noteFactory extends Factory
{
    protected $model =note::class;

    public function definition()
    {
        return [
            'function_name' => 'first function',
            'description' => fake()->sentence(),
            'status' => STATUS::AWAIT,
        ];
        
    }

}
