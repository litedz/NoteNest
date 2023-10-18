<?php

namespace notenest\notenest\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use notenest\notenest\Models\status_func;

class statusFactory extends Factory
{
    protected $model = status_func::class;

    public function definition()
    {
        return [
            'status' => 'AWAIT',
        ];

    }
}
