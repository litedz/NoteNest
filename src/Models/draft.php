<?php

namespace notenest\notenest\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use notenest\notenest\Database\Factories\draftFactory;

class draft extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    protected static function newFactory(): Factory
    {
        return draftFactory::new();
    }
}
