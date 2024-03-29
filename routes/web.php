<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\ficheController;
use App\Http\Controllers\StatutController;
use App\Http\Controllers\periodeController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\fonctionController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\AvancementController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\composantesController;
use App\Http\Controllers\affectationsController;
use App\Http\Controllers\annee_statutController;
use App\Http\Controllers\recherche_statutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\recherche_formationController;
use App\Http\Controllers\recherche_avancementController;
use App\Http\Controllers\recherche_affectationController;
use App\Http\Controllers\RetraiteController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\statistiqueController;
use App\Models\salaire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/accueil', function () {
//     return view('index');
// });

Route::get('/accueil', function () {
   
    $role = DB::table('role_user')
    ->join('roles', 'role_user.role_id', '=', 'roles.id')
    ->select('role_user.*','roles.*')
    ->where("role_user.user_id",Auth::user()->id)->first();
    $emp=DB::table("employers")->get();
    $user=DB::table("users")->get();
    $conge=DB::table("conges")->get();
    // return redirect()->intended(RouteServiceProvider::HOME,compact('role'));
    return view('index',compact('role','emp','user','conge'));
    // return view('index');

})->middleware(['auth'])->name('accueil');

require __DIR__.'/auth.php';
require __DIR__.'/conges.php';

Route::get('/', function () {
    return view('pages.login');
})->name('/');

Route::get('/password', function () {
    $role = DB::table('role_user')
    ->join('roles', 'role_user.role_id', '=', 'roles.id')
    ->select('role_user.*','roles.*')
    ->where("role_user.user_id",Auth::user()->id)->first();
    return view('pages.password',compact('role'));
})->name('password');
//


Route::get('/getServiceByComposante/{composante_id}',[serviceController::class,'getServiceByComposante'])->middleware(['auth']);
Route::get('/getFonctionByService/{service_id}',[fonctionController::class,'getFonctionByService'])->middleware(['auth']);




Route::resource('/composante',composantesController::class)->middleware(['auth']);
Route::resource('/service',serviceController::class)->middleware(['auth']);
Route::resource('/fonction',fonctionController::class)->middleware(['auth']);
// Route::get('/annee',[pageController::class,'annee'])->middleware(['auth'])->name('annee');
Route::resource('/annee',periodeController::class)->middleware(['auth']);
Route::get('/affectation',[pageController::class,'affectation'])->middleware(['auth'])->name('affectation');
// Route::get('/profil',[pageController::class,'profil'])->middleware(['auth'])->name('profil');
Route::get('/profil',[RegisteredUserController::class,'profil'])->middleware(['auth'])->name('profil');
Route::get('/matricule',[pageController::class,'recherche'])->middleware(['auth'])->name('recherche');
Route::get('/home',[pageController::class,'login'])->middleware(['auth'])->name('home');
Route::get('/recherche_formation',[recherche_formationController::class,'index'])->middleware(['auth'])->name('recherche_formation');
Route::get('/recherche_statut',[recherche_statutController::class,'index'])->middleware(['auth'])->name('recherche_statut');
Route::get('/recherche_avancement',[recherche_avancementController::class,'index'])->middleware(['auth'])->name('recherche_avancement');
Route::get('/recherche_affectation',[recherche_affectationController::class,'index'])->middleware(['auth'])->name('recherche_affectation');
Route::get('/avance',[recherche_avancementController::class,'recherche'])->middleware(['auth'])->name('avance');
Route::get('/affecta',[recherche_affectationController::class,'recherche'])->middleware(['auth'])->name('affecta');
Route::get('/form',[recherche_formationController::class,'recherche'])->middleware(['auth'])->name('form');
Route::get('/stat',[recherche_statutController::class,'recherche'])->middleware(['auth'])->name('stat');
Route::get('/statut',[annee_statutController::class,'index'])->middleware(['auth'])->name('statut');
Route::post('/statut_re',[StatutController::class, 'statut_re'])->middleware(['auth'])->name('statut_re');
Route::post('/statut/getCorps',[annee_statutController::class, 'getCorps'])->middleware(['auth'])->name('getCorps');
Route::post('/statut/getEchelons',[annee_statutController::class, 'getEchelons'])->middleware(['auth'])->name('getEchelons');
Route::post('/statut/getClasses',[annee_statutController::class, 'getClasses'])->middleware(['auth'])->name('getClasses');
Route::post('/statut/getIndices',[annee_statutController::class, 'getIndices'])->middleware(['auth'])->name('getIndices');
Route::post('/affectations/corps',[affectationsController::class,'corps'])->middleware(['auth'])->name('corps');
Route::post('/affectations/echelons',[affectationsController::class,'echelons'])->middleware(['auth'])->name('echelons');
Route::post('/affectations/classes',[affectationsController::class,'classes'])->middleware(['auth'])->name('classes');
Route::post('/affectations/indices',[affectationsController::class,'indices'])->middleware(['auth'])->name('indices');
Route::resource('/affectations',affectationsController::class)->middleware(['auth']);
Route::resource('/employer',EmployerController::class)->middleware(['auth']);
Route::get('/Liste_employée',[EmployerController::class,'liste'])->middleware(['auth'])->name('liste');
Route::resource('/formation',FormationController::class)->middleware(['auth']);
Route::resource('/statut/form',StatutController::class)->middleware(['auth']);
Route::resource('/avancement',AvancementController::class)->middleware(['auth']);
Route::post('/avancement_re',[AvancementController::class, 'avancement_re'])->middleware(['auth'])->name('avancement_re');
Route::post('/avancement/getCorps',[AvancementController::class, 'getCorps'])->middleware(['auth'])->name('getCorps');
Route::post('/avancement/getEchelons',[AvancementController::class, 'getEchelons'])->middleware(['auth'])->name('getEchelons');
Route::post('/avancement/getClasses',[AvancementController::class, 'getClasses'])->middleware(['auth'])->name('getClasses');
Route::post('/avancement/getIndices',[AvancementController::class, 'getIndices'])->middleware(['auth'])->name('getIndices');
Route::resource('/affectation',AffectationController::class)->middleware(['auth']);
Route::post('/affectation/getComposantes',[AffectationController::class, 'getComposantes'])->middleware(['auth'])->name('getComposantes');
Route::post('/affectation/getServices',[AffectationController::class, 'getServices'])->middleware(['auth'])->name('getServices');
Route::post('/affectation/getFonctions',[AffectationController::class, 'getFonctions'])->middleware(['auth'])->name('getFonctions');
Route::post('/affectation/getAnnees',[AffectationController::class, 'getAnnees'])->middleware(['auth'])->name('getAnnees');
Route::get('/recherche_fiche',[ficheController::class,'index'])->name('recherche_fiche')->middleware(['auth']);
Route::get('/fiche',[ficheController::class,'recherche'])->name('fiche')->middleware(['auth']);
Route::get('/fiche_signaletique/{id}',[ficheController::class, 'fiche_signaletique'])->middleware(['auth'])->name('fiche_signaletique');
Route::get('/Statistique_composantes',[statistiqueController::class, 'composantes'])->middleware(['auth'])->name('composantes');
Route::get('/Statistique_genre',[statistiqueController::class, 'genre'])->middleware(['auth'])->name('genre');
Route::resource('/retraites',RetraiteController::class)->middleware(['auth']);
Route::get('/periodes_re/{id}',[RetraiteController::class,'periode_re'])->middleware(['auth'])->name('periodes_re');
Route::get('/Periode_retraites',[RetraiteController::class, 'pageRe'])->middleware(['auth'])->name('page_re');
Route::get('/liste_retraites',[RetraiteController::class, 'liste_retraites'])->middleware(['auth'])->name('liste_retraites');
Route::get("/contrat_normal_cdd",[ContratController::class,'index'])->middleware(['auth']);
Route::get("/contrat_normal_cdi",[ContratController::class,'cdi'])->middleware(['auth']);
Route::get("/contrat_forfaitaire",[ContratController::class,'contrat_forfaitaire'])->middleware(['auth']);
Route::get("/contrat_corps_enseignant",[ContratController::class,'contrat_corps_enseignant'])->middleware(['auth']);
Route::get("/contrat_vacation",[ContratController::class,'contrat_vacation'])->middleware(['auth']);
Route::get("/contrat_femme_menage",[ContratController::class,'contrat_femme_menage'])->middleware(['auth']);
Route::get("/contrat_securite",[ContratController::class,'contrat_securite'])->middleware(['auth']);
Route::get("/liste_contrat/{id}",[ContratController::class,'liste_contrat'])->middleware(['auth'])->name('liste_contrat');
Route::get("/edition_contrat/{id}",[ContratController::class,'edition_contrat'])->middleware(['auth'])->name('edition');
Route::post("/form_cdd",[ContratController::class,'form_cdd'])->name('form_cdd')->middleware(['auth']);
Route::post("/form_cdi",[ContratController::class,'form_cdi'])->name('form_cdi')->middleware(['auth']);
Route::post("/form_femme_menage",[ContratController::class,'form_femme_menage'])->middleware(['auth'])->name('form_femme_menage');
Route::post("/form_forfaitaire",[ContratController::class,'form_forfaitaire'])->middleware(['auth'])->name('form_forfaitaire');
Route::post("/form_securite",[ContratController::class,'form_securite'])->middleware(['auth'])->name('form_securite');
Route::post("/form_vacation",[ContratController::class,'form_vacation'])->middleware(['auth'])->name('form_vacation');
Route::get("/liste_cdd",[ContratController::class,'liste_cdd'])->middleware(['auth'])->name('liste_cdd');
Route::get("/liste_cdi",[ContratController::class,'liste_cdi'])->middleware(['auth'])->name('liste_cdi');
Route::get("/contrat_cdd/{id}",[ContratController::class,'contrat_cdd'])->middleware(['auth'])->name('contrat_cdd');
Route::get("/contrat_cdi/{id}",[ContratController::class,'contrat_cdi'])->middleware(['auth'])->name('contrat_cdi');
Route::post('/grilles_indiciaires',[affectationsController::class,'grilles_indiciaires'])->middleware(['auth'])->name('grilles_indiciaires');
Route::get('/grilles_corps',[affectationsController::class,'corps_grille'])->middleware(['auth'])->name('corps_grille');
Route::get('/recherche_user',[SalaireController::class,'recherche_user'])->middleware(['auth'])->name('recherche_user');
Route::resource('/salaire',SalaireController::class)->middleware(['auth']);
Route::get('/composantes',[composantesController::class,'composantes'])->middleware(['auth'])->name('composante');
Route::post('/composantes/getService',[ComposantesController::class,'getService'])->middleware(['auth'])->name('getService');
Route::post('/liste_composantes',[composantesController::class,'liste_composantes'])->middleware(['auth'])->name('liste_composantes');










































