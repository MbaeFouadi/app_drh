<?php

namespace App\Http\Controllers;

use App\Models\annees;
use App\Models\employer;
use App\Models\composante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ficheController extends Controller
{
    //

    public function index()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        return view('pages.rechercheFiche',compact('role'));
    }

    public function recherche(Request $request)
    {

        $request->validate([
            'search'=>"required|exists:employers,matricule",
        ]);
        $composantes=composante::all();
        $annees=annees::all();


        $employer = DB::table('employers')
        ->where("employers.matricule",'like','%'.$request->search.'%')->first();

        $formations = DB::table('employer_formation')
        ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
        ->select('employer_formation.*','formations.*')
        ->where("employer_formation.employer_id",$employer->id)->get();

        $statut=DB::table('statuts')->where('id',$employer->statut_id)->first();

        $grille= DB::table('statuts')
        ->join('corps', 'statuts.corps_id', '=', 'corps.id')
        ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
        ->join('indices', 'statuts.indices_id', '=', 'indices.id')
        ->join('classes', 'statuts.classes_id', '=', 'classes.id')
        ->select('statuts.*','corps.nom as corp','echelons.nom as echelon','indices.nom as indice','classes.nom as classe')

        ->where("statuts.id",$employer->statut_id)->first();

        $avancements= DB::table('avancement_employer')

        ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
        ->select('avancement_employer.*','avancements.*')
        ->where("avancement_employer.employer_id",$employer->id)->get();

        $grilles= DB::table('avancements')
        ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
        ->join('corps', 'avancements.corps_id', '=', 'corps.id')
        ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
        ->join('indices', 'avancements.indices_id', '=', 'indices.id')
        ->join('classes', 'avancements.classes_id', '=', 'classes.id')
        ->select('avancements.*','avancement_employer.*','corps.nom as corp','echelons.nom as echelon','indices.nom as indice','classes.nom as classe')

        ->where("avancement_employer.employer_id",$employer->id)->first();
        $statut=DB::table('statuts')->where('id',$employer->statut_id)->first();


        $affectation = DB::table('affecation_employers')
        ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
        ->select('affecation_employers.*','affectations.*')
        ->where("affecation_employers.employer_id",$employer->id)->get();

        $composante= DB::table('affectations')

        ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
        ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
        ->join('services', 'affectations.service_id', '=', 'services.id')
        ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
        ->select('affecation_employers.*','affectations.*','composantes.nom as composante','services.nom as service','fonctions.*')
        ->orderByDesc('affecation_employers.id')
        ->where("affecation_employers.employer_id",$employer->id)
        ->first();
        return view('pages.fiche',compact('employer','formations','statut','grille','avancements','grilles','affectation','composante'));
    }

    public function fiche_signaletique($id)
    {
        $composantes=composante::all();
        $annees=annees::all();


        $employer = DB::table('employers')
        ->where("employers.id",$id)->first();

        $employers = DB::table('employers')
        ->join('positions','employers.position_id','=','positions.id')
        ->select('employers.*','positions.*')
        ->where("employers.id",$employer->id)->first();

        $formations = DB::table('employer_formation')
        ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
        ->select('employer_formation.*','formations.*')
        ->where("employer_formation.employer_id",$employer->id)->get();

        $statut=DB::table('statuts')->where('id',$employer->statut_id)->first();

        $grille= DB::table('statuts')
        ->join('corps', 'statuts.corps_id', '=', 'corps.id')
        ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
        ->join('indices', 'statuts.indices_id', '=', 'indices.id')
        ->join('classes', 'statuts.classes_id', '=', 'classes.id')
        ->select('statuts.*','corps.nom as corp','echelons.nom as echelon','indices.nom as indice','classes.nom as classe')

        ->where("statuts.id",$employer->statut_id)->first();

        $avancements= DB::table('avancement_employer')
        ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
        ->select('avancement_employer.*','avancements.*')
        ->where("avancement_employer.employer_id",$employer->id)->get();

        $grilles= DB::table('avancements')
        ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
        ->join('corps', 'avancements.corps_id', '=', 'corps.id')
        ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
        ->join('indices', 'avancements.indices_id', '=', 'indices.id')
        ->join('classes', 'avancements.classes_id', '=', 'classes.id')
        ->select('avancements.*','avancement_employer.*','corps.nom as corp','echelons.nom as echelon','indices.nom as indice','classes.nom as classe')

        ->where("avancement_employer.employer_id",$employer->id)->first();
        $statut=DB::table('statuts')->where('id',$employer->statut_id)->first();


        $affectation = DB::table('affecation_employers')
        ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
        ->select('affecation_employers.*','affectations.*')
        ->where("affecation_employers.employer_id",$employer->id)->get();

        $composante= DB::table('affectations')

        ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
        ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
        ->join('services', 'affectations.service_id', '=', 'services.id')
        ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
        ->select('affecation_employers.*','affectations.*','composantes.nom as composante','services.nom as service','fonctions.*')
        ->orderByDesc('affecation_employers.id')
        ->where("affecation_employers.employer_id",$employer->id)
        ->first();
        return view('pages.fiche',compact('employer','formations','statut','grille','avancements','grilles','affectation','composante','employers'));
    }
}
