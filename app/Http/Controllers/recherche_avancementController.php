<?php

namespace App\Http\Controllers;

use App\Models\annees;
use App\Models\employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class recherche_avancementController extends Controller
{
    //

    public function index()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        return view('pages.recherche_avancement',compact('role'));
    }

    public function recherche(Request $request)
    {
        $request->validate([
            'search'=>"required|exists:employers,matricule",
        ]);
        // $employer=employer::where('user_id',Auth::user()->id)->orderBydesc('id')->first();
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        // $annees=annees::all();
        $annees=DB::table("classes_corps_echelons_indices_periodes")
        ->join('annees','classes_corps_echelons_indices_periodes.periodes_id','=','annees.id')
        ->select('classes_corps_echelons_indices_periodes.periodes_id as periodes_id','annees.annee as annee','annees.id as id_annee')
        ->distinct()
        ->get();
        $employer=employer::where('matricule','like','%'.$request->search.'%')->first();

        return view('pages.avancement_re',compact('annees','employer','role'));
    }
}
