<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employer_formation extends Model
{
    use HasFactory;

    protected $table='employer_formation';
    protected $fillable=['employer_id','formation_id','user_id'];
    public $timestamps=false;



}
