<?php

namespace App\Http\Controllers\Conges;

use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CongesController extends Controller
{

    public function connexion(Request $request)
    {
        // $request->validate([
        //     'matricule'=>'required',
        //     'password'=>'required',
        // ]);

        // auth()->attempt([
        //     'matricule' => $request->matricule,
        //     'password ' => $request->password,
        // ]);
        // if(DB::table('profils')->where('matricule','=',$request->matricule)->exists())
        // {
        //     $employ = DB::table('profils')->where('matricule','=',$request->matricule)->first();
        //     $pass = $request->password;
        //     if($employ->password == $pass)
        //     {
        //         $employe = DB::table('employers')
        //         ->join('profils', 'employers.id', '=', 'profils.employe_id')
        //         ->select('employers.*')
        //         ->where("employers.id",$request->matricule)->first();

        //         return view('pages.conges.dash', compact('employe'));
        //     }else{
        //         session()->flash('erreurPassword',"Le mot de passe est incorrect.");
        //         return redirect()->route('conges');
        //     }
        //     // return $employe->matricule." ".$employe->password;

        // }else{
        //     session()->flash('erreurMatricule',"Le matricule n'est pas dans notre base");
        //     return redirect()->route('conges');
        // }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

        $conges = DB::table('employers')
        ->join('conges', 'conges.id_employe', '=', 'employers.id')
        ->select('employers.id as idEmpl','employers.matricule','conges.*')
        ->orderBy('conges.id','desc')
        ->get();
        //$conges = DB::table('conges')->orderBy('id','desc')->get();
        // $conges = DB::select('select `employers`.`id` as `idEmpl`, `employers`.`matricule`, `conges`.* from `employers` inner join `conges` on employers.id = conges.id_employe ORDER BY conges.id ASC');
      return view('pages.conges.lesconges',compact('conges','role'));


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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$im)
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();

        // $employe = DB::select('select `employers`.`id` as `idEmpl`, `employers`.`matricule`, `employers`.`nom`, `employers`.`prenom`, `conges`.* from `employers` inner join `conges` on employers.id = conges.id_employe WHERE employers.id = ? ORDER BY conges.id DESC',[$id]);

        $employe = DB::table('employers')
        ->join('conges','employers.id','=','conges.id_employe')
        ->where('employers.id',$im)
        ->where('conges.id',$id)
        ->select('employers.*','conges.id as idConge','conges.date_debut','conges.nombre_jour','conges.jour')
        ->first();
        return view('pages.conges.showConges',compact('role','employe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $idEmpl = $request->idEmpl;
        $mod = $request->modConge;
        if ($mod==1) {
            $motif = "Félicitation, Votre demande a été accepté.";
            // $is_ok = 1;
            DB::table('conges')
            ->where('id', $id)
            ->update(['reponse' => 1,'is_ok' => 1,'motif' => $motif]);
        } elseif($mod==0) {
            $motif = $request->motif;
            DB::table('conges')
            ->where('id', $id)
            ->update(['reponse' => 1,'is_ok' => 0,'motif' => $motif]);
        }
        // $conge = Conge::find($id);
        // $conge->motif = $motif;
        // $conge->is_ok = $is_ok;
        
        return redirect()->route('conges.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
