<?php

namespace notenest\notenest\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use notenest\notenest\Models\note;
use traits\STATUS;

class noteFactory extends Factory
{
    protected $model =note::class;

    public function definition()
    {
        return [
            'function_name' => 'first function',
            'description' => fake()->sentence(),
            'status_id' => 1,
        ];
        
    }

}
