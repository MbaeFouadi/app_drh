<?php

namespace App\Http\Controllers;

use App\Models\annees;
use App\Models\employer;
use App\Models\avancement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\avancement_employer;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;


class AvancementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employer = employer::where('user_id', Auth::user()->id)->orderBydesc('id')->first();
        // $annees=annees::all();
        $annees = DB::table("classes_corps_echelons_indices_periodes")
            ->join('annees', 'classes_corps_echelons_indices_periodes.periodes_id', '=', 'annees.id')
            ->select('classes_corps_echelons_indices_periodes.periodes_id as periodes_id', 'annees.annee as annee', 'annees.id as id_annee')
            ->distinct()
            ->get();
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        return view('pages.avancement', compact('annees', 'employer', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'date_avan' => 'required',
            'date_dec' => 'required',
            'note' => 'required',
            'corps' => 'required',
            'echelons' => 'required',
            'classes' => 'required',
            'indices' => 'required',


        ]);

        avancement::create([
            'date_avan' => $request->date_avan,
            'date_dec' => $request->date_dec,
            'note' => $request->note,
            'type' => $request->type,
            'type_av' => $request->type_av,
            'corps_id' => $request->corps,
            'echelons_id' => $request->echelons,
            'classes_id' => $request->classes,
            'indices_id' => $request->indices,
            'user_id' => Auth::user()->id

        ]);

        $avancement = avancement::where('user_id', Auth::user()->id)->orderByDesc('id')->first();
        // $employer=employer::where('user_id',Auth::user()->id)->orderByDesc('id')->first();

        avancement_employer::create([
            'employer_id' => $request->employer_id,
            'avancement_id' => $avancement->id,
            'user_id' => Auth::user()->id
        ]);

        session()->flash("message", "avancement créer avec succès");
        Flashy::message('Avancement créer avec succès');



        return redirect(route('avancement.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\avancement  $avancement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $annees = annees::all();
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();

        $avancement = DB::table('avancements')
            ->join('corps', 'avancements.corps_id', '=', 'corps.id')
            ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
            ->join('indices', 'avancements.indices_id', '=', 'indices.id')
            ->join('classes', 'avancements.classes_id', '=', 'classes.id')
            ->select('avancements.*', 'corps.nom as corp', 'corps.id as corps_id', 'echelons.nom as echelon', 'echelons.id as echelons_id', 'indices.nom as indice', 'indices.id as indices_id', 'classes.nom as classe', 'classes.id as classes_id')
            ->where('avancements.id', $id)
            ->first();

        $annee = DB::table('classes_corps_echelons_indices_periodes')
            ->join('annees', 'classes_corps_echelons_indices_periodes.periodes_id', '=', 'annees.id')
            ->select('classes_corps_echelons_indices_periodes.*', 'annees.*')
            ->Where("classes_corps_echelons_indices_periodes.corps_id", $avancement->corps_id)
            ->Where("classes_corps_echelons_indices_periodes.echelons_id", $avancement->echelons_id)
            ->Where("classes_corps_echelons_indices_periodes.classes_id", $avancement->classes_id)
            ->Where("classes_corps_echelons_indices_periodes.indices_id", $avancement->indices_id)
            ->first();

        return view('pages.edit_avancement', compact('avancement', 'role', 'annees', 'annee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\avancement  $avancement
     * @return \Illuminate\Http\Response
     */
    public function edit(avancement $avancement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\avancement  $avancement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update = DB::table('avancements')
            ->where('id', $id)
            ->update([
                'date_avan' => $request->date_avan,
                'date_dec' => $request->date_dec,
                'note' => $request->note,
                'type'=>$request->type,
                'type_av' => $request->type_av, 
                'corps_id' => $request->corps,
                'echelons_id' => $request->echelons,
                'classes_id' => $request->classes,
                'indices_id' => $request->indices,
            ]);

        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();

        $datas = DB::table("employers")->get();
        return view("pages.liste", compact("role", 'datas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\avancement  $avancement
     * @return \Illuminate\Http\Response
     */
    public function destroy(avancement $avancement)
    {
        //
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

    public function getClasses(Request $request)
    {


        $classes = DB::table('classes_corps_echelons_indices_periodes')
            ->join('classes', 'classes_corps_echelons_indices_periodes.classes_id', '=', 'classes.id')
            ->select('classes_corps_echelons_indices_periodes.*', 'classes.*')
            ->where("classes_corps_echelons_indices_periodes.periodes_id", $request->annees)
            ->Where("classes_corps_echelons_indices_periodes.corps_id", $request->corps_id)
            // ->Where("classes_corps_echelons_indices_periodes.echelons_id",$request->echelons_id)
            ->pluck("nom", "id");
        return response()->json($classes);
    }

    public function getEchelons(Request $request)
    {


        $echelons = DB::table('classes_corps_echelons_indices_periodes')
            ->join('echelons', 'classes_corps_echelons_indices_periodes.echelons_id', '=', 'echelons.id')
            ->select('classes_corps_echelons_indices_periodes.*', 'echelons.*')
            ->where("classes_corps_echelons_indices_periodes.periodes_id", $request->annees)
            ->Where("classes_corps_echelons_indices_periodes.corps_id", $request->corps_id)
            ->Where("classes_corps_echelons_indices_periodes.classes_id", $request->classes_id)
            ->pluck("nom", "id");
        return response()->json($echelons);
    }

    public function getIndices(Request $request)
    {


        $echelons = DB::table('classes_corps_echelons_indices_periodes')
            ->join('indices', 'classes_corps_echelons_indices_periodes.indices_id', '=', 'indices.id')
            ->select('classes_corps_echelons_indices_periodes.*', 'indices.*')
            ->where("classes_corps_echelons_indices_periodes.periodes_id", $request->annees)
            ->Where("classes_corps_echelons_indices_periodes.corps_id", $request->corps_id)
            ->Where("classes_corps_echelons_indices_periodes.classes_id", $request->classes_id)
            ->Where("classes_corps_echelons_indices_periodes.echelons_id", $request->echelons_id)
            ->pluck("nom", "id");
        return response()->json($echelons);
    }


    public function avancement_re(Request $request)
    {
        $request->validate([
            'date_avan' => 'required',
            'date_dec' => 'required',
            'note' => 'required',
            'corps' => 'required',
            'echelons' => 'required',
            'classes' => 'required',
            'indices' => 'required',


        ]);

        avancement::create([
            'date_avan' => $request->date_avan,
            'date_dec' => $request->date_dec,
            'note' => $request->note,
            'type' => $request->type,
            'type_av' => $request->type_av,
            'corps_id' => $request->corps,
            'echelons_id' => $request->echelons,
            'classes_id' => $request->classes,
            'indices_id' => $request->indices,
            'user_id' => Auth::user()->id

        ]);

        $avancement = avancement::where('user_id', Auth::user()->id)->orderByDesc('id')->first();
        // $employer=employer::where('user_id',Auth::user()->id)->orderByDesc('id')->first();

        // $avancement=DB::table('avancements')
        // ->join('employers','employers.user_id','=','avancements.user_id')
        // ->select('avancements.id as avancements_id','employers.id')
        // ->where('employers.id',$request->employer_id)
        // ->first();
        avancement_employer::create([
            'employer_id' => $request->employer_id,
            'avancement_id' => $avancement->id,
            'user_id' => Auth::user()->id
        ]);

        session()->flash("message", "avancement créer avec succès");
        Flashy::message('Avancement créer avec succès');



        return redirect(route('liste'));
    }
}
