<?php

namespace notenest\notenest\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use notenest\notenest\Database\Factories\statusFactory;

class status_func extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    protected static function newFactory()
    {
        return statusFactory::new();
    }
}
