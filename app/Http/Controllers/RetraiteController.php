<?php

namespace App\Http\Controllers;

use App\Models\retraite;
use App\Http\Requests\StoreretraiteRequest;
use App\Http\Requests\UpdateretraiteRequest;
use App\Models\annees;
use App\Models\corps;
use App\Models\employer;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class RetraiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $corps = corps::all();
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        return view("pages.retraite_insertion", compact('role', 'corps'));
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
     * @param  \App\Http\Requests\StoreretraiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreretraiteRequest $request)
    {
        //
        // $request->validate([
        //     'corps_id'=>'required',
        //     'age'=>'required'
        // ]);

        retraite::create([
            'corps_id' => $request->corps_id,
            'emploi' => $request->emploi,
            'age' => $request->age,
        ]);

        $corps = corps::all();
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        return view("pages.retraite_insertion", compact('role', 'corps'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\retraite  $retraite
     * @return \Illuminate\Http\Response
     */
    public function show(retraite $retraite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\retraite  $retraite
     * @return \Illuminate\Http\Response
     */
    public function edit(retraite $retraite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateretraiteRequest  $request
     * @param  \App\Models\retraite  $retraite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateretraiteRequest $request, retraite $retraite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\retraite  $retraite
     * @return \Illuminate\Http\Response
     */
    public function destroy(retraite $retraite)
    {
        //
    }

    public function pageRe()
    {

        $dt = new DateTime();
        $date = $dt->format('Y');
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();

        //$dateDifference = substr("1940-08-22", 0, -6);
        // $age = 70;



        $users = DB::table('avancements')
            ->join('avancement_employer', 'avancements.id', '=', 'avancement_employer.avancement_id')
            ->join('retraites', 'avancements.corps_id', '=', 'retraites.corps_id')
            ->join('employers', 'avancement_employer.employer_id', '=', 'employers.id')
            ->join('corps', 'corps.id', '=', 'avancements.corps_id')
            ->select('avancements.*', 'avancement_employer.*', 'retraites.*', 'employers.*', 'corps.nom as nom_corps')
            ->where('employers.position_id', 1)
            ->orderByDesc('avancements.id')
            ->get();





        // $xD = DB::table('avancements')
        // ->join('avancement_employer', 'avancements.id', '=', 'avancement_employer.avancement_id')
        // ->join('retraites', 'avancements.corps_id', '=', 'retraites.corps_id')
        // ->join('employers', 'avancement_employer.employer_id', '=', 'employers.id')
        // ->join('corps', 'corps.id', '=', 'avancements.corps_id')
        // ->select('avancements.*','avancement_employer.*','retraites.*','employers.*','corps.nom as nom_corps')
        // ->where('retraites.age','>',($date - intval(substr('employers.date_naissance',0,4))))
        // ->orderByDesc("avancements.id")
        // ->first();


        // $naissance= intval($date-substr($xD->date_naissance,0,4));
        // $age=$xD->age;
        // return view('pages.pageRe',compact('role','users','dateDifference','naissance','age'));
        return view('pages.pageRe', compact('role', 'users', 'date'));
    }
    public function liste_retraites()
    {
        $contrats = DB::table("employers")
            ->where("type_contrat_id",'=', 3)
            ->get();

        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();
        return view('pages.liste_retraites', compact('contrats', 'role'));
    }

    public function periode_re($id)
    {


        $update=DB::table("employers")
        ->where('id', $id)
        ->update([
            'position_id'=>3
        ]);

        $dt = new DateTime();
        $date = $dt->format('Y');
        $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*', 'roles.*')
            ->where("role_user.user_id", Auth::user()->id)->first();

        //$dateDifference = substr("1940-08-22", 0, -6);
        // $age = 70;



        $users = DB::table('avancements')
            ->join('avancement_employer', 'avancements.id', '=', 'avancement_employer.avancement_id')
            ->join('retraites', 'avancements.corps_id', '=', 'retraites.corps_id')
            ->join('employers', 'avancement_employer.employer_id', '=', 'employers.id')
            ->join('corps', 'corps.id', '=', 'avancements.corps_id')
            ->select('avancements.*', 'avancement_employer.*', 'retraites.*', 'employers.*', 'corps.nom as nom_corps')
            ->where('employers.position_id', 1)
            ->orderByDesc('avancements.id')
            ->get();

        return view('pages.pageRe', compact('role', 'users', 'date'));

    }
}
