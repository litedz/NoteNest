<?php

namespace notenest\notenest\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use notenest\notenest\Database\Factories\draftFactory;

class Draft extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    protected static function newFactory()
    {
        return draftFactory::new();
    }
}
