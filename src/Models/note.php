<?php

namespace notenest\notenest\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    use HasFactory;

    protected $fillable = ['function_name', 'description', 'priority', 'status'];
}
