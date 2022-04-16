<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class composante extends Model
{
    use HasFactory;

    protected $fillable=['nom','code_des'];
}
