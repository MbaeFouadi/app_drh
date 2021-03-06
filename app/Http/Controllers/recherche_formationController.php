<?php

namespace App\Http\Controllers;

use App\Models\employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class recherche_formationController extends Controller
{
    //

    public function index()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        return view('pages.recherFormation',compact('role'));
    }

    public function recherche(Request $request)
    {

        $request->validate([
            'search'=>"required|exists:employers,matricule",
        ]);
        $employer=employer::where('matricule','like','%'.$request->search.'%')->first();

        $roles=DB::table('roles')->first();

        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        return view('pages.formation',compact('employer','roles','role'));
    }




}
