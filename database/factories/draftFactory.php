<?php

namespace notenest\notenest\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use notenest\notenest\Models\Draft;

class draftFactory extends Factory
{
    protected $model = Draft::class;

    public function definition()
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->sentences(3,true),
        ];

    }
}
