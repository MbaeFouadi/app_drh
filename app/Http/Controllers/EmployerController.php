<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $annees=DB::table('annees')->get();
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();



        // $emp=DB::table("employers")->OrderByDesc('id')->first();
        // $annee='2015';
        // $nbre='2';
        // $mat="UDC"."-".$emp->id."/".substr($annee,2);
        return view('pages.identite',compact('role','annees'));

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
            
            'nom'=>'required',
            'prenom'=>'required',
            'date_naissance'=>'required',
            'lieu_naissance'=>'required',
            'adresse'=>'required',
            'telephone'=>'required',
            'email'=>'required',
            
            'sexe'=>'required',
            'statut'=>'required',
            'compte_bancaire'=>'required'
        ]);

        $emp=DB::table("employers")->OrderByDesc('id')->first();
        $nbre=$emp->id+1;
        $mat="UDC"."-".$nbre."/".substr($request->annee,2);
        employer::create(['matricule'=>$mat,
        'nom'=>$request->nom,
        'prenom'=>$request->prenom,
        'date_naissance'=>$request->date_naissance,
        'lieu_naissance'=>$request->lieu_naissance,
        'adresse'=>$request->adresse,
        'telephone'=>$request->telephone,
        'email'=>$request->email,
        'password'=>Hash::make('password'),
        'sexe'=>$request->sexe,
        'statut'=>$request->statut,
        'nombre_enfant'=>$request->nombre_enfant,
        'nombre_charge'=>$request->nombre_charge,
        'naissance'=>$request->naissance,
        'compte_bancaire'=>$request->compte_bancaire,
        'user_id'=>Auth::user()->id]);

        //$max_id = DB::table('employers')->max('id');

        // Profil::create([
        //     'matricule' =>$request->matricule,
        //     'password' => "password",
        //     'employe_id' => $max_id,
        // ]);

        return redirect(route('formation.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $annees=DB::table('annees')->get();
        $data=DB::table('employers')->where('id',$id)->first();
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

        $avancements= DB::table('avancement_employer')
        ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
        ->join('employers', 'avancement_employer.employer_id', '=', 'employers.id')
        ->select('avancement_employer.employer_id','avancements.id as id_ava','avancements.date_avan','employers.nom','employers.prenom','employers.matricule')
        ->where("avancement_employer.employer_id",$id)->get();

        $formations = DB::table('employer_formation')
        ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
        ->join('employers', 'employer_formation.employer_id', '=', 'employers.id')
        ->select('employer_formation.*','formations.id as id_formation','formations.diplome','employers.nom','employers.prenom','employers.matricule')
        ->where("employer_formation.employer_id",$id)->get();

        $affectations = DB::table('affecation_employers')
        ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
        ->join('employers', 'affecation_employers.employer_id', '=', 'employers.id')
        ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
        ->select('affecation_employers.*','affectations.id as id_affec','affectations.composante_id','employers.nom','employers.prenom','employers.matricule','composantes.nom as composante')
        ->where("affecation_employers.employer_id",$id)->get();

        $statut=DB::table('statuts') 
        ->join('corps', 'statuts.corps_id', '=', 'corps.id')
        ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
        ->join('indices', 'statuts.indices_id', '=', 'indices.id')
        ->join('classes', 'statuts.classes_id', '=', 'classes.id')
        ->select('statuts.*','corps.nom as corp','corps.id as corps_id','echelons.nom as echelon','echelons.id as echelons_id','indices.nom as indice','indices.id as indices_id','classes.nom as classe','classes.id as classes_id')

        ->where("statuts.id",$data->statut_id)->first();

        $annee = DB::table('classes_corps_echelons_indices_periodes')
        ->join('annees', 'classes_corps_echelons_indices_periodes.periodes_id', '=', 'annees.id')
        ->select('classes_corps_echelons_indices_periodes.*','annees.*')
        ->Where("classes_corps_echelons_indices_periodes.corps_id",$statut->corps_id)
        ->Where("classes_corps_echelons_indices_periodes.echelons_id",$statut->echelons_id)
        ->Where("classes_corps_echelons_indices_periodes.classes_id",$statut->classes_id)
        ->Where("classes_corps_echelons_indices_periodes.indices_id",$statut->indices_id)
        ->first();


        return view("pages.edit_employer",compact("data",'role','annees','avancements','formations','affectations','statut','annee'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //

        $update=DB::table('employers')
        ->where('id',$id)
        ->update(['nom'=>$request->nom,
        'prenom'=>$request->prenom,
        'date_naissance'=>$request->date_naissance,
        'lieu_naissance'=>$request->lieu_naissance,
        'adresse'=>$request->adresse,
        'telephone'=>$request->telephone,
        'email'=>$request->email,
        'sexe'=>$request->sexe,
        'statut'=>$request->statut,
        'nombre_enfant'=>$request->nombre_enfant,
        'nombre_charge'=>$request->nombre_charge,
        'naissance'=>$request->naissance,
        'compte_bancaire'=>$request->compte_bancaire]);

        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

        $datas=DB::table("employers")->get();
        return view("pages.liste",compact("role",'datas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(employer $employer)
    {
        //
    }

    public function liste()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

        $datas=DB::table("employers")->get();
        return view("pages.liste",compact("role",'datas'));
    }
}
