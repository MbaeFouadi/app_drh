<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avancement_employer extends Model
{
    use HasFactory;

    protected $table='avancement_employer';
    protected $fillable=['employer_id','avancement_id','user_id'];
    public $timestamps=false;
}
