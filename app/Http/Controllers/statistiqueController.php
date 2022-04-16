<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class statistiqueController extends Controller
{
    //

    public function composantes()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

        $composante=DB::table('composantes')->get();

        return view('pages.statistiques_composante',compact('role','composante'));
    }

    public function genre()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

        $M=DB::table('employers')->where('sexe','M')->get();
        $Masculin=$M->count();
        $F=DB::table('employers')->where('sexe','F')->get();
        $Feminin=$F->count();



        return view('pages.statistiques_genre',compact('role','Masculin','Feminin'));
    }
}
