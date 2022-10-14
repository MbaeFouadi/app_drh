<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avancement extends Model
{
    use HasFactory;


    protected $fillable=['date_avan','date_dec','note','corps_id','echelons_id','classes_id','indices_id','ministere','user_id','type','type_av'];
}
