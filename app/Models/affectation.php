<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affectation extends Model
{
    use HasFactory;

    protected $fillable=['numero_post','position','composante_id','service_id','fonction_id','employer_id','user_id'];
}
