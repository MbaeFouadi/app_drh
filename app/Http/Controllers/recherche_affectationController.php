<?php

namespace App\Http\Controllers;

use App\Models\annees;
use App\Models\employer;
use App\Models\composante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class recherche_affectationController extends Controller
{
    public function index()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        return view('pages.recherche_affectation',compact('role'));
    }

    public function recherche(Request $request)
    {
        $request->validate([
            'search'=>"required|exists:employers,matricule",
        ]);
        $composantes=composante::all();
        $periodes = DB::table('fonctions')
        ->join("periodes","fonctions.annee_id","=","periodes.id")
        ->select("periodes.periode","fonctions.annee_id")
        ->distinct()
        ->orderByDesc("periodes.periode")
        ->get();
        $annees=annees::all();
        $employer=employer::where('matricule','like','%'.$request->search.'%')->first();
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

        return view('pages.affectation',compact('employer','composantes','annees','role','periodes'));
    }
}
