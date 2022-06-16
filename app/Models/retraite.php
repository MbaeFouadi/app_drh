<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class retraite extends Model
{
    use HasFactory;
    protected $fillable=['corps_id','emploi','age'];
}
