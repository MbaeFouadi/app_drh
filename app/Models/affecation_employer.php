<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affecation_employer extends Model
{
    use HasFactory;

    protected $fillable=['affectation_id','employer_id','user_id'];
}
