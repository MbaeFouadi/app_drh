<?php

namespace App\Http\Controllers;

use App\Models\corps;
use App\Models\classes;
use App\Models\indices;
use App\Models\echelons;
use App\Models\periodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class affController extends Controller
{
    //

    public function corps()
    {
        //
        $corps=corps::all();
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

         //$corps=DB::table('corps')->get();
         //dd($datas);
         return view('pages.affectations',compact('corps','role'));
    }

    public function classes()
    {
        //
        $classes=classes::all();
         //$corps=DB::table('corps')->get();
         //dd($datas);
         return view('pages.affectations',compact('classes'));
    }

    public function echelons()
    {
        //
        $echelons=echelons::all();
         //$corps=DB::table('corps')->get();
         //dd($datas);
         return view('pages.affectations',compact('echelons'));
    }

    public function indices()
    {
        //
        $indices=indices::all();
         //$corps=DB::table('corps')->get();
         //dd($datas);
         return view('pages.affectations',compact('indices'));
    }

    public function periodes()
    {
        //
        $periodes=periodes::all();
         //$corps=DB::table('corps')->get();
         //dd($datas);
         return view('pages.affectations',compact('periodes'));
    }
}
