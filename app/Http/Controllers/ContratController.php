<?php

namespace App\Http\Controllers;

use App\Models\contrat;
use App\Http\Requests\StorecontratRequest;
use App\Http\Requests\UpdatecontratRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("pages.contrat_cdd");
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
     * @param  \App\Http\Requests\StorecontratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecontratRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function show(contrat $contrat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function edit(contrat $contrat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecontratRequest  $request
     * @param  \App\Models\contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecontratRequest $request, contrat $contrat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function destroy(contrat $contrat)
    {
        //
    }

    public function cdi()
    {
        return view('pages.contrat_cdi');
    }

    public function contrat_forfaitaire()
    {
        return view('pages.contrat_forfaitaire');
    }

    public function contrat_corps_enseignant()
    {
        return view('pages.contrat_corps_enseignant');
    }

    public function contrat_vacation()
    {
        return view("pages.contrat_vacation");
    }

    public function contrat_femme_menage()
    {
        return view("pages.contrat_femme_menage");
    }

    public function contrat_securite()
    {
        return view("pages.contrat_securite");
    }

    public function liste_contrat($id)
    {

        // $ide=$id;
        $users = DB::table('employers')
            ->where('employers.type_contrat_id', 3)
            ->get();

        Session::put('id', $id);
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        return view('pages.liste_contrat', compact("role", 'users', 'id'));
    }

    public function edition_contrat($id)
    {

        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();

        $session_id = Session::get('id');

        if ($session_id == 1) {
            return view("pages.form_cdd", compact('role', 'session_id', 'id'));
        } elseif ($session_id == 2) {

            $session_id = Session::get('id');

            if ($session_id == 1) {

                $type_contrat = 1;
                $contrat_id = 1;
            } elseif ($session_id == 2) {
                $type_contrat = 1;
                $contrat_id = 2;
            } elseif ($session_id == 3) {
                $type_contrat = 1;
                $contrat_id = 4;
            } elseif ($session_id == 4) {

                $type_contrat = 1;
                $contrat_id = 3;
            } elseif ($session_id == 5) {
                $type_contrat = 1;
                $contrat_id = 6;
            } elseif ($session_id == 6) {
                $type_contrat = 2;
                $contrat_id = 1;
            } elseif ($session_id == 7) {
                $type_contrat = 2;
                $contrat_id = 5;
            }


            DB::table('contrat_contenu')->insert([

                'employers_id' => $id,
                'type_contrat_id' => $type_contrat,
                'contrat_id' => $contrat_id,
            ]);

            $employers = DB::table('employers')
                ->where('id', $id)
                ->update(['type_contrat_id' => 1]);

            $employer = DB::table('employers')
                ->where("employers.id", '=', $id)->first();

            $employers = DB::table('employers')
                ->join('positions', 'employers.position_id', '=', 'positions.id')
                ->select('employers.*', 'positions.*')
                ->where("employers.id", $employer->id)->first();

            $formations = DB::table('employer_formation')
                ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
                ->select('employer_formation.*', 'formations.*')
                ->where("employer_formation.employer_id", $employer->id)
                ->orderByDesc("employer_formation.id")->first();

            $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();

            $grille = DB::table('statuts')
                ->join('corps', 'statuts.corps_id', '=', 'corps.id')
                ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
                ->join('indices', 'statuts.indices_id', '=', 'indices.id')
                ->join('classes', 'statuts.classes_id', '=', 'classes.id')
                ->select('statuts.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')

                ->where("statuts.id", $employer->statut_id)->first();

            $avancements = DB::table('avancement_employer')
                ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
                ->select('avancement_employer.*', 'avancements.*')
                ->where("avancement_employer.employer_id", $employer->id)->orderByDesc("avancement_employer.id")->first();

            $grilles = DB::table('avancements')
                ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
                ->join('corps', 'avancements.corps_id', '=', 'corps.id')
                ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
                ->join('indices', 'avancements.indices_id', '=', 'indices.id')
                ->join('classes', 'avancements.classes_id', '=', 'classes.id')
                ->select('avancements.*', 'avancement_employer.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')
                ->where("avancement_employer.employer_id", $employer->id)
                ->orderByDesc("avancement_employer.id")
                ->first();

            $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();


            $affectation = DB::table('affecation_employers')
                ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
                ->select('affecation_employers.*', 'affectations.*')
                ->where("affecation_employers.employer_id", $employer->id)
                ->orderByDesc("affecation_employers.id")
                ->first();

            $composante = DB::table('affectations')

                ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
                ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
                ->join('services', 'affectations.service_id', '=', 'services.id')
                ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
                ->select('affecation_employers.*', 'affectations.*', 'composantes.nom as composante', 'services.nom as service', 'fonctions.*')
                ->orderByDesc('affecation_employers.id')
                ->where("affecation_employers.employer_id", $employer->id)
                ->first();

            $contrat = DB::table("employers")
                ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
                ->select('employers.*', 'contrat_contenu.*')
                ->orderByDesc("contrat_contenu.id")
                ->first();

            return view('pages.contrat_corps_enseignant', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
        } elseif ($session_id == 3) {
            return view("pages.form_forfaitaire", compact('role', 'session_id', 'id'));
        } elseif ($session_id == 4) {
            return view("pages.form_vacation", compact('role', 'session_id', 'id'));
        } elseif ($session_id == 5) {
            return view("pages.form_femme_menage", compact('role', 'session_id', 'id'));
        } elseif ($session_id == 6) {
            return view("pages.form_cdi", compact('role', 'session_id', 'id'));
        } elseif ($session_id == 7) {

            $session_id = Session::get('id');

            if ($session_id == 1) {

                $type_contrat = 1;
                $contrat_id = 1;
            } elseif ($session_id == 2) {
                $type_contrat = 1;
                $contrat_id = 2;
            } elseif ($session_id == 3) {
                $type_contrat = 1;
                $contrat_id = 4;
            } elseif ($session_id == 4) {

                $type_contrat = 1;
                $contrat_id = 3;
            } elseif ($session_id == 5) {
                $type_contrat = 1;
                $contrat_id = 6;
            } elseif ($session_id == 6) {
                $type_contrat = 2;
                $contrat_id = 1;
            } elseif ($session_id == 7) {
                $type_contrat = 2;
                $contrat_id = 5;
            }


            DB::table('contrat_contenu')->insert([

                'employers_id' => $id,
                'type_contrat_id' => $type_contrat,
                'contrat_id' => $contrat_id,
            ]);

            $employers = DB::table('employers')
                ->where('id', $id)
                ->update(['type_contrat_id' => 2]);

            $employer = DB::table('employers')
                ->where("employers.id", '=', $id)->first();

            $employers = DB::table('employers')
                ->join('positions', 'employers.position_id', '=', 'positions.id')
                ->select('employers.*', 'positions.*')
                ->where("employers.id", $employer->id)->first();

            $formations = DB::table('employer_formation')
                ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
                ->select('employer_formation.*', 'formations.*')
                ->where("employer_formation.employer_id", $employer->id)
                ->orderByDesc("employer_formation.id")->first();

            $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();

            $grille = DB::table('statuts')
                ->join('corps', 'statuts.corps_id', '=', 'corps.id')
                ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
                ->join('indices', 'statuts.indices_id', '=', 'indices.id')
                ->join('classes', 'statuts.classes_id', '=', 'classes.id')
                ->select('statuts.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')

                ->where("statuts.id", $employer->statut_id)->first();

            $avancements = DB::table('avancement_employer')
                ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
                ->select('avancement_employer.*', 'avancements.*')
                ->where("avancement_employer.employer_id", $employer->id)->orderByDesc("avancement_employer.id")->first();

            $grilles = DB::table('avancements')
                ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
                ->join('corps', 'avancements.corps_id', '=', 'corps.id')
                ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
                ->join('indices', 'avancements.indices_id', '=', 'indices.id')
                ->join('classes', 'avancements.classes_id', '=', 'classes.id')
                ->select('avancements.*', 'avancement_employer.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')
                ->where("avancement_employer.employer_id", $employer->id)
                ->orderByDesc("avancement_employer.id")
                ->first();

            $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();


            $affectation = DB::table('affecation_employers')
                ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
                ->select('affecation_employers.*', 'affectations.*')
                ->where("affecation_employers.employer_id", $employer->id)
                ->orderByDesc("affecation_employers.id")
                ->first();

            $composante = DB::table('affectations')

                ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
                ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
                ->join('services', 'affectations.service_id', '=', 'services.id')
                ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
                ->select('affecation_employers.*', 'affectations.*', 'composantes.nom as composante', 'services.nom as service', 'fonctions.*')
                ->orderByDesc('affecation_employers.id')
                ->where("affecation_employers.employer_id", $employer->id)
                ->first();

            $contrat = DB::table("employers")
                ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
                ->select('employers.*', 'contrat_contenu.*')
                ->orderByDesc("contrat_contenu.id")
                ->first();

            return view('pages.contrat_securite', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
        } else {

            return view("pages.liste_contrat", compact('role', 'session_id'));
        }
    }

    public function form_cdd(Request $request)
    {

        $session_id = Session::get('id');

        if ($session_id == 1) {

            $type_contrat = 1;
            $contrat_id = 1;
        } elseif ($session_id == 2) {
            $type_contrat = 1;
            $contrat_id = 2;
        } elseif ($session_id == 3) {
            $type_contrat = 1;
            $contrat_id = 4;
        } elseif ($session_id == 4) {

            $type_contrat = 1;
            $contrat_id = 3;
        } elseif ($session_id == 5) {
            $type_contrat = 1;
            $contrat_id = 6;
        } elseif ($session_id == 6) {
            $type_contrat = 2;
            $contrat_id = 1;
        } elseif ($session_id == 7) {
            $type_contrat = 2;
            $contrat_id = 5;
        }

        $request->validate([
            'duree' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        DB::table('contrat_contenu')->insert([
            'duree' => $request->duree,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'employers_id' => $request->employer_id,
            'type_contrat_id' => $type_contrat,
            'contrat_id' => $contrat_id,
        ]);

        $employers = DB::table('employers')
            ->where('id', $request->employer_id)
            ->update(['type_contrat_id' => 1]);

        $employer = DB::table('employers')
            ->where("employers.id", '=', $request->employer_id)->first();

        $employers = DB::table('employers')
            ->join('positions', 'employers.position_id', '=', 'positions.id')
            ->select('employers.*', 'positions.*')
            ->where("employers.id", $employer->id)->first();

        $formations = DB::table('employer_formation')
            ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
            ->select('employer_formation.*', 'formations.*')
            ->where("employer_formation.employer_id", $employer->id)
            ->orderByDesc("employer_formation.id")->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();

        $grille = DB::table('statuts')
            ->join('corps', 'statuts.corps_id', '=', 'corps.id')
            ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
            ->join('indices', 'statuts.indices_id', '=', 'indices.id')
            ->join('classes', 'statuts.classes_id', '=', 'classes.id')
            ->select('statuts.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')

            ->where("statuts.id", $employer->statut_id)->first();

        $avancements = DB::table('avancement_employer')
            ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->select('avancement_employer.*', 'avancements.*')
            ->where("avancement_employer.employer_id", $employer->id)->orderByDesc("avancement_employer.id")->first();

        $grilles = DB::table('avancements')
            ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->join('corps', 'avancements.corps_id', '=', 'corps.id')
            ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
            ->join('indices', 'avancements.indices_id', '=', 'indices.id')
            ->join('classes', 'avancements.classes_id', '=', 'classes.id')
            ->select('avancements.*', 'avancement_employer.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')
            ->where("avancement_employer.employer_id", $employer->id)
            ->orderByDesc("avancement_employer.id")
            ->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();


        $affectation = DB::table('affecation_employers')
            ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->select('affecation_employers.*', 'affectations.*')
            ->where("affecation_employers.employer_id", $employer->id)
            ->orderByDesc("affecation_employers.id")
            ->first();

        $composante = DB::table('affectations')

            ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
            ->join('services', 'affectations.service_id', '=', 'services.id')
            ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
            ->select('affecation_employers.*', 'affectations.*', 'composantes.nom as composante', 'services.nom as service', 'fonctions.*')
            ->orderByDesc('affecation_employers.id')
            ->where("affecation_employers.employer_id", $employer->id)
            ->first();

        $contrat = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.*', 'contrat_contenu.*')
            ->orderByDesc("contrat_contenu.id")
            ->first();

        return view('pages.contrat_cdd', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
    }
    public function form_cdi(Request $request)
    {
        $session_id = Session::get('id');

        if ($session_id == 1) {

            $type_contrat = 1;
            $contrat_id = 1;
        } elseif ($session_id == 2) {
            $type_contrat = 1;
            $contrat_id = 2;
        } elseif ($session_id == 3) {
            $type_contrat = 1;
            $contrat_id = 4;
        } elseif ($session_id == 4) {

            $type_contrat = 1;
            $contrat_id = 3;
        } elseif ($session_id == 5) {
            $type_contrat = 1;
            $contrat_id = 6;
        } elseif ($session_id == 6) {
            $type_contrat = 2;
            $contrat_id = 1;
        } elseif ($session_id == 7) {
            $type_contrat = 2;
            $contrat_id = 5;
        }

        $request->validate([
            'date_debut' => 'required',

        ]);

        DB::table('contrat_contenu')->insert([
            'date_debut' => $request->date_debut,
            'employers_id' => $request->employer_id,
            'type_contrat_id' => $type_contrat,
            'contrat_id' => $contrat_id,
        ]);

        $employers = DB::table('employers')
            ->where('id', $request->employer_id)
            ->update(['type_contrat_id' => 2]);

        $employer = DB::table('employers')
            ->where("employers.id", '=', $request->employer_id)->first();

        $employers = DB::table('employers')
            ->join('positions', 'employers.position_id', '=', 'positions.id')
            ->select('employers.*', 'positions.*')
            ->where("employers.id", $employer->id)->first();

        $formations = DB::table('employer_formation')
            ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
            ->select('employer_formation.*', 'formations.*')
            ->where("employer_formation.employer_id", $employer->id)
            ->orderByDesc("employer_formation.id")->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();

        $grille = DB::table('statuts')
            ->join('corps', 'statuts.corps_id', '=', 'corps.id')
            ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
            ->join('indices', 'statuts.indices_id', '=', 'indices.id')
            ->join('classes', 'statuts.classes_id', '=', 'classes.id')
            ->select('statuts.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')

            ->where("statuts.id", $employer->statut_id)->first();

        $avancements = DB::table('avancement_employer')
            ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->select('avancement_employer.*', 'avancements.*')
            ->where("avancement_employer.employer_id", $employer->id)->orderByDesc("avancement_employer.id")->first();

        $grilles = DB::table('avancements')
            ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->join('corps', 'avancements.corps_id', '=', 'corps.id')
            ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
            ->join('indices', 'avancements.indices_id', '=', 'indices.id')
            ->join('classes', 'avancements.classes_id', '=', 'classes.id')
            ->select('avancements.*', 'avancement_employer.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')
            ->where("avancement_employer.employer_id", $employer->id)
            ->orderByDesc("avancement_employer.id")
            ->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();


        $affectation = DB::table('affecation_employers')
            ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->select('affecation_employers.*', 'affectations.*')
            ->where("affecation_employers.employer_id", $employer->id)
            ->orderByDesc("affecation_employers.id")
            ->first();

        $composante = DB::table('affectations')

            ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
            ->join('services', 'affectations.service_id', '=', 'services.id')
            ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
            ->select('affecation_employers.*', 'affectations.*', 'composantes.nom as composante', 'services.nom as service', 'fonctions.*')
            ->orderByDesc('affecation_employers.id')
            ->where("affecation_employers.employer_id", $employer->id)
            ->first();

        $contrat = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.*', 'contrat_contenu.*')
            ->orderByDesc("contrat_contenu.id")
            ->first();

        return view('pages.contrat_cdi', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
    }
    public function form_femme_menage(Request $request)
    {
        $session_id = Session::get('id');

        if ($session_id == 1) {

            $type_contrat = 1;
            $contrat_id = 1;
        } elseif ($session_id == 2) {
            $type_contrat = 1;
            $contrat_id = 2;
        } elseif ($session_id == 3) {
            $type_contrat = 1;
            $contrat_id = 4;
        } elseif ($session_id == 4) {

            $type_contrat = 1;
            $contrat_id = 3;
        } elseif ($session_id == 5) {
            $type_contrat = 1;
            $contrat_id = 6;
        } elseif ($session_id == 6) {
            $type_contrat = 2;
            $contrat_id = 1;
        } elseif ($session_id == 7) {
            $type_contrat = 2;
            $contrat_id = 5;
        }

        $request->validate([
            'duree' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        DB::table('contrat_contenu')->insert([
            'duree' => $request->duree,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'employers_id' => $request->employer_id,
            'type_contrat_id' => $type_contrat,
            'contrat_id' => $contrat_id,
        ]);


        $employers = DB::table('employers')
            ->where('id', $request->employer_id)
            ->update(['type_contrat_id' => 1]);

        $employer = DB::table('employers')
            ->where("employers.id", '=', $request->employer_id)->first();

        $employers = DB::table('employers')
            ->join('positions', 'employers.position_id', '=', 'positions.id')
            ->select('employers.*', 'positions.*')
            ->where("employers.id", $employer->id)->first();

        $formations = DB::table('employer_formation')
            ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
            ->select('employer_formation.*', 'formations.*')
            ->where("employer_formation.employer_id", $employer->id)
            ->orderByDesc("employer_formation.id")->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();

        $grille = DB::table('statuts')
            ->join('corps', 'statuts.corps_id', '=', 'corps.id')
            ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
            ->join('indices', 'statuts.indices_id', '=', 'indices.id')
            ->join('classes', 'statuts.classes_id', '=', 'classes.id')
            ->select('statuts.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')

            ->where("statuts.id", $employer->statut_id)->first();

        $avancements = DB::table('avancement_employer')
            ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->select('avancement_employer.*', 'avancements.*')
            ->where("avancement_employer.employer_id", $employer->id)->orderByDesc("avancement_employer.id")->first();

        $grilles = DB::table('avancements')
            ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->join('corps', 'avancements.corps_id', '=', 'corps.id')
            ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
            ->join('indices', 'avancements.indices_id', '=', 'indices.id')
            ->join('classes', 'avancements.classes_id', '=', 'classes.id')
            ->select('avancements.*', 'avancement_employer.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')
            ->where("avancement_employer.employer_id", $employer->id)
            ->orderByDesc("avancement_employer.id")
            ->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();


        $affectation = DB::table('affecation_employers')
            ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->select('affecation_employers.*', 'affectations.*')
            ->where("affecation_employers.employer_id", $employer->id)
            ->orderByDesc("affecation_employers.id")
            ->first();

        $composante = DB::table('affectations')

            ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
            ->join('services', 'affectations.service_id', '=', 'services.id')
            ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
            ->select('affecation_employers.*', 'affectations.*', 'composantes.nom as composante', 'services.nom as service', 'fonctions.*')
            ->orderByDesc('affecation_employers.id')
            ->where("affecation_employers.employer_id", $employer->id)
            ->first();

        $contrat = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.*', 'contrat_contenu.*')
            ->orderByDesc("contrat_contenu.id")
            ->first();

        return view('pages.contrat_femme_menage', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
    }
    public function form_forfaitaire(Request $request)
    {
        $session_id = Session::get('id');

        if ($session_id == 1) {

            $type_contrat = 1;
            $contrat_id = 1;
        } elseif ($session_id == 2) {
            $type_contrat = 1;
            $contrat_id = 2;
        } elseif ($session_id == 3) {
            $type_contrat = 1;
            $contrat_id = 4;
        } elseif ($session_id == 4) {

            $type_contrat = 1;
            $contrat_id = 3;
        } elseif ($session_id == 5) {
            $type_contrat = 1;
            $contrat_id = 6;
        } elseif ($session_id == 6) {
            $type_contrat = 2;
            $contrat_id = 1;
        } elseif ($session_id == 7) {
            $type_contrat = 2;
            $contrat_id = 5;
        }

        $request->validate([
            'semestre' => 'required',
            'annee_academique' => 'required',
        ]);

        DB::table('contrat_contenu')->insert([
            'semestre' => $request->semestre,
            'année_academique' => $request->annee_academique,
            'employers_id' => $request->employer_id,
            'type_contrat_id' => $type_contrat,
            'contrat_id' => $contrat_id,
        ]);

        $employers = DB::table('employers')
            ->where('id', $request->employer_id)
            ->update(['type_contrat_id' => 1]);

        $employer = DB::table('employers')
            ->where("employers.id", '=', $request->employer_id)->first();

        $employers = DB::table('employers')
            ->join('positions', 'employers.position_id', '=', 'positions.id')
            ->select('employers.*', 'positions.*')
            ->where("employers.id", $employer->id)->first();

        $formations = DB::table('employer_formation')
            ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
            ->select('employer_formation.*', 'formations.*')
            ->where("employer_formation.employer_id", $employer->id)
            ->orderByDesc("employer_formation.id")->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();

        $grille = DB::table('statuts')
            ->join('corps', 'statuts.corps_id', '=', 'corps.id')
            ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
            ->join('indices', 'statuts.indices_id', '=', 'indices.id')
            ->join('classes', 'statuts.classes_id', '=', 'classes.id')
            ->select('statuts.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')

            ->where("statuts.id", $employer->statut_id)->first();

        $avancements = DB::table('avancement_employer')
            ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->select('avancement_employer.*', 'avancements.*')
            ->where("avancement_employer.employer_id", $employer->id)->orderByDesc("avancement_employer.id")->first();

        $grilles = DB::table('avancements')
            ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->join('corps', 'avancements.corps_id', '=', 'corps.id')
            ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
            ->join('indices', 'avancements.indices_id', '=', 'indices.id')
            ->join('classes', 'avancements.classes_id', '=', 'classes.id')
            ->select('avancements.*', 'avancement_employer.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')
            ->where("avancement_employer.employer_id", $employer->id)
            ->orderByDesc("avancement_employer.id")
            ->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();


        $affectation = DB::table('affecation_employers')
            ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->select('affecation_employers.*', 'affectations.*')
            ->where("affecation_employers.employer_id", $employer->id)
            ->orderByDesc("affecation_employers.id")
            ->first();

        $composante = DB::table('affectations')

            ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
            ->join('services', 'affectations.service_id', '=', 'services.id')
            ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
            ->select('affecation_employers.*', 'affectations.*', 'composantes.nom as composante', 'services.nom as service', 'fonctions.*')
            ->orderByDesc('affecation_employers.id')
            ->where("affecation_employers.employer_id", $employer->id)
            ->first();

        $contrat = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.*', 'contrat_contenu.*')
            ->orderByDesc("contrat_contenu.id")
            ->first();

        return view('pages.contrat_forfaitaire', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
    }
    public function form_securite(Request $request)
    {
    }
    public function form_vacation(Request $request)
    {
        $session_id = Session::get('id');

        if ($session_id == 1) {

            $type_contrat = 1;
            $contrat_id = 1;
        } elseif ($session_id == 2) {
            $type_contrat = 1;
            $contrat_id = 2;
        } elseif ($session_id == 3) {
            $type_contrat = 1;
            $contrat_id = 4;
        } elseif ($session_id == 4) {

            $type_contrat = 1;
            $contrat_id = 3;
        } elseif ($session_id == 5) {
            $type_contrat = 1;
            $contrat_id = 6;
        } elseif ($session_id == 6) {
            $type_contrat = 2;
            $contrat_id = 1;
        } elseif ($session_id == 7) {
            $type_contrat = 2;
            $contrat_id = 5;
        }

        $request->validate([
            'semestre' => 'required',
            'annee_academique' => 'required',
        ]);

        DB::table('contrat_contenu')->insert([
            'semestre' => $request->semestre,
            'année_academique' => $request->annee_academique,
            'employers_id' => $request->employer_id,
            'type_contrat_id' => $type_contrat,
            'contrat_id' => $contrat_id,
        ]);


        $employers = DB::table('employers')
            ->where('id', $request->employer_id)
            ->update(['type_contrat_id' => 1]);

        $employer = DB::table('employers')
            ->where("employers.id", '=', $request->employer_id)->first();

        $employers = DB::table('employers')
            ->join('positions', 'employers.position_id', '=', 'positions.id')
            ->select('employers.*', 'positions.*')
            ->where("employers.id", $employer->id)->first();

        $formations = DB::table('employer_formation')
            ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
            ->select('employer_formation.*', 'formations.*')
            ->where("employer_formation.employer_id", $employer->id)
            ->orderByDesc("employer_formation.id")->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();

        $grille = DB::table('statuts')
            ->join('corps', 'statuts.corps_id', '=', 'corps.id')
            ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
            ->join('indices', 'statuts.indices_id', '=', 'indices.id')
            ->join('classes', 'statuts.classes_id', '=', 'classes.id')
            ->select('statuts.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')

            ->where("statuts.id", $employer->statut_id)->first();

        $avancements = DB::table('avancement_employer')
            ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->select('avancement_employer.*', 'avancements.*')
            ->where("avancement_employer.employer_id", $employer->id)->orderByDesc("avancement_employer.id")->first();

        $grilles = DB::table('avancements')
            ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->join('corps', 'avancements.corps_id', '=', 'corps.id')
            ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
            ->join('indices', 'avancements.indices_id', '=', 'indices.id')
            ->join('classes', 'avancements.classes_id', '=', 'classes.id')
            ->select('avancements.*', 'avancement_employer.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')
            ->where("avancement_employer.employer_id", $employer->id)
            ->orderByDesc("avancement_employer.id")
            ->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();


        $affectation = DB::table('affecation_employers')
            ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->select('affecation_employers.*', 'affectations.*')
            ->where("affecation_employers.employer_id", $employer->id)
            ->orderByDesc("affecation_employers.id")
            ->first();

        $composante = DB::table('affectations')

            ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
            ->join('services', 'affectations.service_id', '=', 'services.id')
            ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
            ->select('affecation_employers.*', 'affectations.*', 'composantes.nom as composante', 'services.nom as service', 'fonctions.*')
            ->orderByDesc('affecation_employers.id')
            ->where("affecation_employers.employer_id", $employer->id)
            ->first();

        $contrat = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.*', 'contrat_contenu.*')
            ->orderByDesc("contrat_contenu.id")
            ->first();

        return view('pages.contrat_vacation', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
    }

    public function liste_cdd()
    {
        $contrats = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.matricule', 'employers.id as employer_id', 'employers.nom', 'employers.prenom', 'employers.date_naissance', 'contrat_contenu.employers_id')
            ->distinct()
            ->where("employers.type_contrat_id", 1)
            // ->orderByDesc("contrat_contenu.id")
            ->get(['employers.matricule', 'employers.id', 'employers.nom', 'employers.prenom', 'employers.date_naissance', 'contrat_contenu.employers_id']);

        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        return view('pages.liste_cdd', compact('contrats', 'role'));
    }
    public function liste_cdi()
    {
        $contrats = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.matricule', 'employers.id as employer_id', 'employers.nom', 'employers.prenom', 'employers.date_naissance', 'contrat_contenu.employers_id')
            ->distinct()
            ->where("employers.type_contrat_id", 2)
            // ->orderByDesc("contrat_contenu.id")
            ->get(['employers.matricule', 'employers.id', 'employers.nom', 'employers.prenom', 'employers.date_naissance', 'contrat_contenu.employers_id']);

        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        return view('pages.liste_cdi', compact('contrats', 'role'));
    }

    public function contrat_cdd($id)
    {
        $employer = DB::table('employers')
            ->where("employers.id", '=', $id)->first();

        $employers = DB::table('employers')
            ->join('positions', 'employers.position_id', '=', 'positions.id')
            ->select('employers.*', 'positions.*')
            ->where("employers.id", $employer->id)->first();

        $formations = DB::table('employer_formation')
            ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
            ->select('employer_formation.*', 'formations.*')
            ->where("employer_formation.employer_id", $employer->id)
            ->orderByDesc("employer_formation.id")->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();

        $grille = DB::table('statuts')
            ->join('corps', 'statuts.corps_id', '=', 'corps.id')
            ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
            ->join('indices', 'statuts.indices_id', '=', 'indices.id')
            ->join('classes', 'statuts.classes_id', '=', 'classes.id')
            ->select('statuts.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')

            ->where("statuts.id", $employer->statut_id)->first();

        $avancements = DB::table('avancement_employer')
            ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->select('avancement_employer.*', 'avancements.*')
            ->where("avancement_employer.employer_id", $employer->id)->orderByDesc("avancement_employer.id")->first();

        $grilles = DB::table('avancements')
            ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->join('corps', 'avancements.corps_id', '=', 'corps.id')
            ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
            ->join('indices', 'avancements.indices_id', '=', 'indices.id')
            ->join('classes', 'avancements.classes_id', '=', 'classes.id')
            ->select('avancements.*', 'avancement_employer.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')
            ->where("avancement_employer.employer_id", $employer->id)
            ->orderByDesc("avancement_employer.id")
            ->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();


        $affectation = DB::table('affecation_employers')
            ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->select('affecation_employers.*', 'affectations.*')
            ->where("affecation_employers.employer_id", $employer->id)
            ->orderByDesc("affecation_employers.id")
            ->first();

        $composante = DB::table('affectations')

            ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
            ->join('services', 'affectations.service_id', '=', 'services.id')
            ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
            ->select('affecation_employers.*', 'affectations.*', 'composantes.nom as composante', 'services.nom as service', 'fonctions.*')
            ->orderByDesc('affecation_employers.id')
            ->where("affecation_employers.employer_id", $employer->id)
            ->first();

        $contrat = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.*', 'contrat_contenu.*')
            ->orderByDesc("contrat_contenu.id")
            ->first();
        $contrats = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.*', 'contrat_contenu.*')
            ->where('employers.id', $id)
            ->orderByDesc("contrat_contenu.id")
            ->first();
        if ($contrats->type_contrat_id == 1 && $contrats->contrat_id == 1) {
            return view('pages.contrat_cdd', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
        } elseif ($contrats->type_contrat_id == 1 && $contrats->contrat_id == 2) {

            return view('pages.contrat_corps_enseignant', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
        } elseif ($contrats->type_contrat_id == 1 && $contrats->contrat_id == 3) {

            return view('pages.contrat_vacation', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
        } elseif ($contrats->type_contrat_id == 1 && $contrats->contrat_id == 4) {

            return view('pages.contrat_forfaitaire', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
        } elseif ($contrats->type_contrat_id == 1 && $contrats->contrat_id == 6) {

            return view('pages.contrat_femme_menage', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
        }
    }

    // public function contrat_cdi($id)
    // {
    //     $contrats = DB::table("employers")
    //         ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
    //         ->select('employers.matricule', 'employers.id as employer_id', 'employers.nom', 'employers.prenom', 'employers.date_naissance', 'contrat_contenu.employers_id')
    //         ->distinct()
    //         ->where("employers.type_contrat_id", 1)
    //         // ->orderByDesc("contrat_contenu.id")
    //         ->get(['employers.matricule', 'employers.id', 'employers.nom', 'employers.prenom', 'employers.date_naissance', 'contrat_contenu.employers_id']);

    //     $role = DB::table('role_user')
    //         ->join('roles', 'role_user.role_id', '=', 'roles.id')
    //         ->select('role_user.*', 'roles.*')
    //         ->where("role_user.user_id", Auth::user()->id)->first();
    //     return view('pages.liste_cdd', compact('contrats', 'role'));
    // }
    // public function liste_cdi()
    // {
    //     $contrats = DB::table("employers")
    //         ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
    //         ->select('employers.matricule', 'employers.id as employer_id', 'employers.nom', 'employers.prenom', 'employers.date_naissance', 'contrat_contenu.employers_id')
    //         ->distinct()
    //         ->where("employers.type_contrat_id", 2)
    //         // ->orderByDesc("contrat_contenu.id")
    //         ->get(['employers.matricule', 'employers.id', 'employers.nom', 'employers.prenom', 'employers.date_naissance', 'contrat_contenu.employers_id']);

    //     $role = DB::table('role_user')
    //         ->join('roles', 'role_user.role_id', '=', 'roles.id')
    //         ->select('role_user.*', 'roles.*')
    //         ->where("role_user.user_id", Auth::user()->id)->first();
    //     return view('pages.liste_cdi', compact('contrats', 'role'));
    // }

    public function contrat_cdi($id)
    {
        $employer = DB::table('employers')
            ->where("employers.id", '=', $id)->first();

        $employers = DB::table('employers')
            ->join('positions', 'employers.position_id', '=', 'positions.id')
            ->select('employers.*', 'positions.*')
            ->where("employers.id", $employer->id)->first();

        $formations = DB::table('employer_formation')
            ->join('formations', 'employer_formation.formation_id', '=', 'formations.id')
            ->select('employer_formation.*', 'formations.*')
            ->where("employer_formation.employer_id", $employer->id)
            ->orderByDesc("employer_formation.id")->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();

        $grille = DB::table('statuts')
            ->join('corps', 'statuts.corps_id', '=', 'corps.id')
            ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
            ->join('indices', 'statuts.indices_id', '=', 'indices.id')
            ->join('classes', 'statuts.classes_id', '=', 'classes.id')
            ->select('statuts.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')

            ->where("statuts.id", $employer->statut_id)->first();

        $avancements = DB::table('avancement_employer')
            ->join('avancements', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->select('avancement_employer.*', 'avancements.*')
            ->where("avancement_employer.employer_id", $employer->id)->orderByDesc("avancement_employer.id")->first();

        $grilles = DB::table('avancements')
            ->join('avancement_employer', 'avancement_employer.avancement_id', '=', 'avancements.id')
            ->join('corps', 'avancements.corps_id', '=', 'corps.id')
            ->join('echelons', 'avancements.echelons_id', '=', 'echelons.id')
            ->join('indices', 'avancements.indices_id', '=', 'indices.id')
            ->join('classes', 'avancements.classes_id', '=', 'classes.id')
            ->select('avancements.*', 'avancement_employer.*', 'corps.nom as corp', 'echelons.nom as echelon', 'indices.nom as indice', 'classes.nom as classe')
            ->where("avancement_employer.employer_id", $employer->id)
            ->orderByDesc("avancement_employer.id")
            ->first();

        $statut = DB::table('statuts')->where('id', $employer->statut_id)->first();


        $affectation = DB::table('affecation_employers')
            ->join('affectations', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->select('affecation_employers.*', 'affectations.*')
            ->where("affecation_employers.employer_id", $employer->id)
            ->orderByDesc("affecation_employers.id")
            ->first();

        $composante = DB::table('affectations')

            ->join('affecation_employers', 'affecation_employers.affectation_id', '=', 'affectations.id')
            ->join('composantes', 'affectations.composante_id', '=', 'composantes.id')
            ->join('services', 'affectations.service_id', '=', 'services.id')
            ->join('fonctions', 'affectations.fonction_id', '=', 'fonctions.id')
            ->select('affecation_employers.*', 'affectations.*', 'composantes.nom as composante', 'services.nom as service', 'fonctions.*')
            ->orderByDesc('affecation_employers.id')
            ->where("affecation_employers.employer_id", $employer->id)
            ->first();

        $contrat = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.*', 'contrat_contenu.*')
            ->orderByDesc("contrat_contenu.id")
            ->first();

        $contrats = DB::table("employers")
            ->join('contrat_contenu', 'employers.id', '=', 'contrat_contenu.employers_id')
            ->select('employers.*', 'contrat_contenu.*')
            ->where('employers.id', $id)
            ->orderByDesc("contrat_contenu.id")
            ->first();
        if ($contrats->type_contrat_id == 2 && $contrat->contrat_id == 1) {

            return view('pages.contrat_cdi', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
        } elseif ($contrat->type_contrat_id == 2 && $contrat->contrat_id == 5) {

            return view('pages.contrat_securite', compact('employer', 'formations', 'statut', 'grille', 'avancements', 'grilles', 'affectation', 'composante', 'employers', 'contrat'));
        }
    }
}
