<?php

namespace App\Http\Controllers;

use App\Models\corps;
use App\Models\annees;
use App\Models\classes;
use App\Models\indices;
use App\Models\echelons;
use App\Models\employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\classes_corps_echelons_indices_periode;

class annee_statutController extends Controller
{
    //

    public function index()
    {

        $employer = employer::where('user_id', Auth::user()->id)->orderBydesc('id')->first();
        $annees = annees::all();
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        $classes = classes::all();
        $corps = corps::all();
        $echelons = echelons::all();
        $indices = indices::all();
        return view('pages.statut', compact('annees', 'employer', 'role', 'classes', 'corps', 'echelons', 'indices'));
    }



    public function getCorps(Request $request)
    {
        $corps = DB::table('classes_corps_echelons_indices_periodes')
            ->join('corps', 'classes_corps_echelons_indices_periodes.corps_id', '=', 'corps.id')
            ->select('classes_corps_echelons_indices_periodes.*', 'corps.*')
            ->where("classes_corps_echelons_indices_periodes.periodes_id", $request->periodes_id)
            ->pluck("nom", "id");
        return response()->json($corps);
    }

    public function getEchelons(Request $request)
    {


        $echelons = DB::table('classes_corps_echelons_indices_periodes')
            ->join('echelons', 'classes_corps_echelons_indices_periodes.echelons_id', '=', 'echelons.id')
            ->select('classes_corps_echelons_indices_periodes.*', 'echelons.*')
            ->where("classes_corps_echelons_indices_periodes.periodes_id", $request->annees)
            ->Where("classes_corps_echelons_indices_periodes.corps_id", $request->corps_id)
            ->pluck("nom", "id");
        return response()->json($echelons);
    }

    public function getClasses(Request $request)
    {


        $classes = DB::table('classes_corps_echelons_indices_periodes')
            ->join('classes', 'classes_corps_echelons_indices_periodes.classes_id', '=', 'classes.id')
            ->select('classes_corps_echelons_indices_periodes.*', 'classes.*')
            ->where("classes_corps_echelons_indices_periodes.periodes_id", $request->annees)
            ->Where("classes_corps_echelons_indices_periodes.corps_id", $request->corps_id)
            ->Where("classes_corps_echelons_indices_periodes.echelons_id", $request->echelons_id)
            ->pluck("nom", "id");
        return response()->json($classes);
    }

    public function getIndices(Request $request)
    {


        $echelons = DB::table('classes_corps_echelons_indices_periodes')
            ->join('indices', 'classes_corps_echelons_indices_periodes.indices_id', '=', 'indices.id')
            ->select('classes_corps_echelons_indices_periodes.*', 'indices.*')
            ->where("classes_corps_echelons_indices_periodes.periodes_id", $request->annees)
            ->Where("classes_corps_echelons_indices_periodes.corps_id", $request->corps_id)
            ->Where("classes_corps_echelons_indices_periodes.echelons_id", $request->echelons_id)
            ->Where("classes_corps_echelons_indices_periodes.classes_id", $request->classes_id)
            ->pluck("nom", "id");
        return response()->json($echelons);
    }
}
