<?php

namespace App\Http\Controllers;
use App\Models\corps;
use App\Models\annees;
use App\Models\classes;
use App\Models\indices;
use App\Models\echelons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\classes_corps_echelons_indices_periode;
use MercurySeries\Flashy\Flashy;


class affectationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes=classes::all();
        $corps=corps::all();
        $indices=indices::all();

        // $indices=DB::table("indices")
        // ->orderBy('nom','desc')
        // ->get();
        $echelons=echelons::all();
        // $annees=annees::all();

        $annees=DB::table("annees")
        ->orderByRaw("annee")
        ->get();
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        // dd($corps);

        return view('pages.affectations',compact('corps','classes','indices','echelons','annees','role'));


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
        $request->validate([
            'classes' => 'required',
            'corps' => 'required',
            'echelons'=>'required',
            'indices'=>'required',
            'periodes'=>'required',
        ]);
        $classes = DB::table('classes_corps_echelons_indices_periodes')
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->periodes)
        ->Where("classes_corps_echelons_indices_periodes.corps_id",$request->corps)
        ->Where("classes_corps_echelons_indices_periodes.classes_id",$request->classes)
        ->Where("classes_corps_echelons_indices_periodes.echelons_id",$request->echelons)
        ->Where("classes_corps_echelons_indices_periodes.indices_id",$request->indices)
        ->get();

        if($classes->count()==1)
        {
            $messages="Vous avez dejà enregistré cette affectation";

            // return view('affectations.index',compact('msg'));
            // return view('pages.affectations',compact('messages'));
            $role = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.*','roles.*')
            ->where("role_user.user_id",Auth::user()->id)->first();
            $classes=classes::all();
            $corps=corps::all();
            $indices=indices::all();
            $echelons=echelons::all();
            $annees=annees::all();
            // dd($corps);

            return view('pages.affectations',compact('corps','classes','indices','echelons','annees','messages','role'));

        }
        else
        {
            classes_corps_echelons_indices_periode::create(['classes_id'=>$request->classes,'corps_id'=>$request->corps,'echelons_id'=>$request->echelons,'indices_id'=>$request->indices,'periodes_id'=>$request->periodes]);
            // session()->flash('message','Evenement creer avec succes');

            // Flashy::message('Insertion reuissi avec succès');
            Flashy::message('Affectation créer avec succès');
            return redirect(route('affectations.index'));
        }

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function corps(Request $request)
    {
        $request->validate([
            'corps_in' =>'unique:corps,nom',

        ]);
        corps::create(['nom'=>$request->corps_in]);
        return redirect(route('affectations.index'));

    }

    public function classes(Request $request)
    {
        $request->validate([
            'classes_in' =>'unique:classes,nom',

        ]);
        classes::create(['nom'=>$request->classes_in]);
        return redirect(route('affectations.index'));
    }

    public function echelons(Request $request)
    {
        $request->validate([
            'echelons_in' =>'unique:echelons,nom',

        ]);
        echelons::create(['nom'=>$request->echelons_in]);
        return redirect(route('affectations.index'));
    }

    public function indices(Request $request)
    {
        $request->validate([
            'indices_in' =>'unique:indices,nom',

        ]);
        indices::create(['nom'=>$request->indices_in]);
        return redirect(route('affectations.index'));

    }

    // public function periodes()
    // {

    // }

    public function grilles_indiciaires(Request $request)
    {
        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        // dd($corps);

        $corps=DB::table("corps")
        ->join('classes_corps_echelons_indices_periodes','classes_corps_echelons_indices_periodes.corps_id','=','corps.id')
        ->select('corps.nom as nom','corps.id as id','classes_corps_echelons_indices_periodes.periodes_id as periodes_id')
        ->distinct()
        ->where("periodes_id",$request->annee_id)
        ->where("corps.id",$request->corps_id)
        ->get();

        
        $classes=DB::table("classes")
        ->join('classes_corps_echelons_indices_periodes','classes_corps_echelons_indices_periodes.classes_id','=','classes.id')
        ->join('corps','classes_corps_echelons_indices_periodes.corps_id','=','corps.id')
        ->select('classes.nom as noms','classes.id as ide','classes_corps_echelons_indices_periodes.periodes_id as periodes_id','classes_corps_echelons_indices_periodes.corps_id as corps_id','corps.*')
        ->distinct()
        ->where("periodes_id",$request->annee_id)
        // ->where("corps_id",$corps->ids)
        ->orderBy('ide','ASC')
        ->get();

        $echelons=DB::table("echelons")
        ->join('classes_corps_echelons_indices_periodes','classes_corps_echelons_indices_periodes.classes_id','=','echelons.id')
        ->join('corps','classes_corps_echelons_indices_periodes.corps_id','=','corps.id')
        ->join('classes','classes_corps_echelons_indices_periodes.classes_id','=','classes.id')
        ->select('classes.nom as noms','classes_corps_echelons_indices_periodes.periodes_id as periodes_id','classes_corps_echelons_indices_periodes.corps_id as corps_id','corps.*','echelons.nom as echelon')
        ->distinct()
        ->where("periodes_id",$request->annee_id)
        // ->where("corps_id",$corps->ids)
        // ->orderBy('id','ASC')
        ->get();

        // $Exce=DB::table("classes_corps_echelons_indices_periodes")
        // ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        // ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        // ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        // ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        // ->where("classes_corps_echelons_indices_periodes.corps_id",3)
        // ->where("classes_corps_echelons_indices_periodes.classes_id",1)
        // ->where("classes_corps_echelons_indices_periodes.echelons_id",4)
        // // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        // ->first();

        $p4=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indice")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",1)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",4)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->first();

        $p3=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",2)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",3)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        ->first();
        $p2=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",2)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",2)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        ->first();
        $p1=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",2)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",1)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->first();
        $first3=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",3)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",3)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        ->first();


        $first2=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",3)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",2)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        ->first();


        $first1=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",3)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",1)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->first();
        $first4=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",3)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",4)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->first();
        $second4=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",4)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",4)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->first();
        $second3=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",4)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",3)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->first();
        $second2=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",4)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",2)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->first();
        $second1=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",4)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",1)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        ->first();
        $stagiaire=DB::table("classes_corps_echelons_indices_periodes")
        ->join("corps",'corps.id','=','classes_corps_echelons_indices_periodes.corps_id')
        ->join("classes",'classes.id',"classes_corps_echelons_indices_periodes.classes_id")
        ->join("echelons","echelons.id","=","classes_corps_echelons_indices_periodes.echelons_id")
        ->join("indices","indices.id","=","classes_corps_echelons_indices_periodes.indices_id")
        ->select("classes_corps_echelons_indices_periodes.*","corps.nom as corp","classes.nom as classe","echelons.nom as echelon","indices.nom as indices")
        ->where("classes_corps_echelons_indices_periodes.corps_id",$request->corps_id)
        ->where("classes_corps_echelons_indices_periodes.classes_id",4)
        ->where("classes_corps_echelons_indices_periodes.echelons_id",5)
        ->where("classes_corps_echelons_indices_periodes.periodes_id",$request->annee_id)
        // ->where("classes_corps_echelons_indices_periodes.indices_id",)
        ->first();



        

        // $grille= DB::table('classes_corps_echelons_indices_periodes')
        // ->join('corps', 'statuts.corps_id', '=', 'corps.id')
        // ->join('echelons', 'statuts.echelons_id', '=', 'echelons.id')
        // ->join('indices', 'statuts.indices_id', '=', 'indices.id')
        // ->join('classes', 'statuts.classes_id', '=', 'classes.id')
        // ->select('statuts.*','corps.nom as corp','echelons.nom as echelon','indices.nom as indice','classes.nom as classe')
        // ->where("statuts.id",)->first();


        return view('pages.grilles_indiciaires',compact('role','corps','classes','echelons','p4','p3','p2','p1','first1','first2','first3','first4','second1','second2','second3','second4','stagiaire'));

    }

    public function corps_grille(){

        $role = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('role_user.*','roles.*')
        ->where("role_user.user_id",Auth::user()->id)->first();
        // $corps=corps::all();
        // $annees=annees::all();
        $corps=DB::table("corps")
        ->join('classes_corps_echelons_indices_periodes','classes_corps_echelons_indices_periodes.corps_id','=','corps.id')
        ->join('annees','classes_corps_echelons_indices_periodes.periodes_id','=','annees.id')
        ->select('corps.nom as nom','corps.id as id_corps','classes_corps_echelons_indices_periodes.periodes_id as periodes_id','annees.annee as annee','annees.id as id_annee')
        ->distinct()
        ->get();
        $annees=DB::table("classes_corps_echelons_indices_periodes")
        ->join('annees','classes_corps_echelons_indices_periodes.periodes_id','=','annees.id')
        ->select('classes_corps_echelons_indices_periodes.periodes_id as periodes_id','annees.annee as annee','annees.id as id_annee')
        ->distinct()
        ->get();
        return view('pages.corps_grille',compact('role','corps','annees'));
    }
}
