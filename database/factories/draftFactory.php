<?php

namespace notenest\notenest\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use notenest\notenest\Models\draft;

class draftFactory extends Factory
{
    protected $model = draft::class;

    public function definition()
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->sentences(3, true),
        ];

    }
}
