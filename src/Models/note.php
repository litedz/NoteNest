<?php

namespace notenest\notenest\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use notenest\notenest\Database\Factories\noteFactory;

class note extends Model
{
    use HasFactory;
    protected $fillable=['name','description'];

}
