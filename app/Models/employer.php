<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employer extends Model
{
    use HasFactory;
    protected $fillable=['id','nin','matricule','nom','prenom','date_naissance','lieu_naissance','adresse','telephone','password','email','sexe','statut','nombre_enfant','nombre_charge','naissance','compte_bancaire','statut_id','user_id','annee_id','type_contrat_id','position_id','ide','agent','mat_fop'];
}
