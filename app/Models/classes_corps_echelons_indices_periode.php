<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes_corps_echelons_indices_periode extends Model
{
    use HasFactory;

    protected $fillable=['classes_id','corps_id','echelons_id','indices_id','periodes_id'];
    protected $table='classes_corps_echelons_indices_periodes';
}
