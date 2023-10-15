<?php

namespace notenest\notenest\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use notenest\notenest\Models\note;

class noteFactory extends Factory
{
    protected $model =note::class;

    public function definition()
    {
        return [
            'name' => 'first function',
            'description' => fake()->sentence(),
        ];
        
    }

}
