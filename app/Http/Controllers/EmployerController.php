<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\employer;
use App\Models\position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use MercurySeries\Flashy\Flashy;

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

        $annees = DB::table('annees')->get();
        $contrats = DB::table('type_contrats')->get();
        $positions = position::all();
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();



        // $emp=DB::table("employers")->OrderByDesc('id')->first();
        // $annee='2015';
        // $nbre='2';
        // $mat="UDC"."-".$emp->id."/".substr($annee,2);
        return view('pages.identite', compact('role', 'annees', 'positions', 'contrats'));
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
            // 'nin' => 'required|unique:employers,nin',
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',

            'sexe' => 'required',
            'statut' => 'required',
            'compte_bancaire' => 'required|unique:employers,compte_bancaire',
            'position_id' => 'required',
            'annee' => 'required',
            // 'type_contrat_id' => 'required',
            'agent' => 'required'
        ]);

        $emp = DB::table("employers")->OrderByDesc('id')->first();
        if (isset($emp)) {
            $nbre = $emp->ide + 1;
        } else {
            $nbre = 1;
        }
        if ($nbre < 10) {
            $mat =  "00" . $nbre . "-" . "U" . "/" . substr($request->annee, 2);
        } elseif ($nbre < 100) {
            $mat =  "0" . $nbre . "-" . "U" . "/" . substr($request->annee, 2);
        } else {
            $mat =  $nbre . "-" . "U" . "/" . substr($request->annee, 2);
        }
        employer::create([
            'matricule' => $mat,
            'mat_fop' => $request->mat_fop,
            'nin' => $request->nin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make('1234'),
            'sexe' => $request->sexe,
            'statut' => $request->statut,
            'nombre_enfant' => $request->nombre_enfant,
            'nombre_charge' => $request->nombre_charge,
            'naissance' => $request->naissance,
            'compte_bancaire' => $request->compte_bancaire,
            'annee_id' => substr($request->date_naissance, 0, -6),
            'position_id' => $request->position_id,
            'type_contrat_id' => $request->type_contrat_id,
            'agent' => $request->agent,
            'ide' => $nbre,
            'user_id' => Auth::user()->id
        ]);

        session()->flash("message", "identité créer avec succès");
        Flashy::message('identité créer avec succès');

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

        $annees = DB::table('annees')->get();
        $data = DB::table('employers')->where('id', $id)->first();
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();

        $avancements = DB::table('avancement_employer')
            ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->join('employers', 'avancement_employer.employer_id', '=', 'employers.id')
            ->select('avancement_employer.employer_id', 'avancements.id as id_ava', 'avancements.date_avan', 'employers.nom', 'employers.prenom', 'employers.matricule')
            ->where("avancement_employer.employer_id", $id)->get();

        $formations = DB::table('employer_formation')
            ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
            ->join('employers', 'employer_formation.employer_id', '=', 'employers.id')
            ->select('employer_formation.*', 'formations.id as id_formation', 'formations.diplome', 'employers.nom', 'employers.prenom', 'employers.matricule')
            ->where("employer_formation.employer_id", $id)->get();

        $affectations = DB::table('affecation_employers')
            ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->join('employers', 'affecation_employers.employer_id', '=', 'employers.id')
            ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
            ->select('affecation_employers.*', 'affectations.id as id_affec', 'affectations.composante_id', 'employers.nom', 'employers.prenom', 'employers.matricule', 'composantes.nom as composante')
            ->where("affecation_employers.employer_id", $id)->get();

        $statut = DB::table('statuts')
            ->join('corps', 'statuts.corps_id', '=', 'corps.id')
            ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
            ->join('indices', 'statuts.indices_id', '=', 'indices.id')
            ->join('classes', 'statuts.classes_id', '=', 'classes.id')
            ->select('statuts.*', 'corps.nom as corp', 'corps.id as corps_id', 'echelons.nom as echelon', 'echelons.id as echelons_id', 'indices.nom as indice', 'indices.id as indices_id', 'classes.nom as classe', 'classes.id as classes_id')
            ->where("statuts.id", $data->statut_id)->first();

           if(isset($statut))
           {
            $annee = DB::table('classes_corps_echelons_indices_periodes')
            ->join('annees', 'classes_corps_echelons_indices_periodes.periodes_id', '=', 'annees.id')
            ->select('classes_corps_echelons_indices_periodes.*', 'annees.*')
            ->Where("classes_corps_echelons_indices_periodes.corps_id", $statut->corps_id)
            ->Where("classes_corps_echelons_indices_periodes.echelons_id", $statut->echelons_id)
            ->Where("classes_corps_echelons_indices_periodes.classes_id", $statut->classes_id)
            ->Where("classes_corps_echelons_indices_periodes.indices_id", $statut->indices_id)
            ->first();
           }



        $contrats = DB::table('type_contrats')->get();
        $contrate = DB::table('type_contrats')
        ->join("employers","employers.type_contrat_id",'=','type_contrats.id')
        ->select("type_contrats.id as contrat_id","type_contrats.code_design_contrat as code_design_contrat","employers.*")
        ->where("employers.id",$id)
        ->first();
        $positions = position::all();

        $posi = DB::table('positions')
        ->join("employers","employers.position_id",'=','positions.id')
        ->select("positions.id as posi_id","positions.position","employers.*")
        ->where("employers.id",$id)
        ->first();
        if(isset($statut))
        {
        return view("pages.edit_employer", compact("data", 'role', 'annees', 'avancements', 'formations', 'affectations', 'statut', 'annee', 'contrats', 'positions','contrate','posi'));

        }
        return view("pages.edit_employer", compact("data", 'role', 'annees', 'avancements', 'formations', 'affectations', 'statut',  'contrats', 'positions','contrate','posi'));


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
    public function update(Request $request, $id)
    {
        //

        $update = DB::table('employers')
            ->where('id', $id)
            ->update([
                'nin' => $request->nin,
                'nom' => $request->nom,
                'mat_fop' => $request->mat_fop,
                'prenom' => $request->prenom,
                'date_naissance' => $request->date_naissance,
                'lieu_naissance' => $request->lieu_naissance,
                'adresse' => $request->adresse,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'sexe' => $request->sexe,
                'statut' => $request->statut,
                'nombre_enfant' => $request->nombre_enfant,
                'nombre_charge' => $request->nombre_charge,
                'naissance' => $request->naissance,
                'annee_id' => substr($request->date_naissance, 0, -6),
                'compte_bancaire' => $request->compte_bancaire,
                'annee_id' => substr($request->date_naissance, 0, -6),
                'position_id' => $request->position_id,
                'type_contrat_id' => $request->type_contrat_id,
                'agent' => $request->agent
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
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();

        $datas = DB::table("employers")
            ->where("type_contrat_id", '=', 1)
            ->orWhere("type_contrat_id", '=', 2)
            ->orWhere("type_contrat_id", '=', 0)
            ->orderByRaw("employers.nom")
            ->get();
        return view("pages.liste", compact("role", 'datas'));
    }
}
