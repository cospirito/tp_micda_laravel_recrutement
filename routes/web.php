<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\EmployeController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\EmployeAuthenticate;

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


/*
|--------------------------------------------------------------------------
| Web Routes Adminis: Get et Post pour les actions d'administrations du système recruzone : TP MICDA M2 
|--------------------------------------------------------------------------
| les methodes Get : Accès administrateur/ Gestion admin
| les methodes Post : Appel via ajax pour l'execution php des traitemens admin

|
| On utilisant le controller Admin pour lancer les différente pages de l'administration 
| Et le différents traitement et appel ajax
| Pour gérer tout ce qui se passéra dans la console Admin
 */

//La route d'entré dans la console d'aministration de recruzone
Route::get(
    '/admin', 
    [Admin::class, 'index']
    )->name('admin-home')->middleware('adminauth')
;

//La route d'acceuil de la console d'aministration de recruzone
Route::get(
    '/admin/home', 
    [Admin::class, 'index']
    )->name('admin-home')->middleware('adminauth')
;

//La route d'affichage de la page de login admin
Route::get(
    '/admin/login', 
    [Admin::class, 'login']
    )->name('admin-login')
;

//Route de deconnexion admin
Route::get(
    '/admin/logout', 
    [Admin::class, 'logout']
    )->name('admin-logout')
;

//La route de gestion des paramètres admin
Route::get(
    '/admin/params',
    [Admin::class, 'params']
    )->name('admin-params')->middleware('adminauth')
;

//La route de gestion des employes par l'administrateur
Route::get(
    '/admin/employes',
    [Admin::class, 'employes']
    )->name('admin-employes')->middleware('adminauth')
;


//La route de gestion des offres d'emplois  par l'administrateur
Route::get(
    '/admin/offres/{etat}',
    [Admin::class, 'offres']
    )->name('admin-offres')->middleware('adminauth')
;

Route::get(
    '/admin/ajouter-offres/',
    [Admin::class, 'ajouterOffres']
    )->name('admin-offres.ajouter')->middleware('adminauth')
;

Route::post(
    '/admin/ajouter-nouvelle-offre',
    [Admin::class, 'nouvelOffre']
    )->name('post.admin.nouvel.offres')
;

Route::post(
    '/admin/modifier-offre-par-id',
    [Admin::class, 'modifierOffre']
    )->name('post.admin.modifier.offre')
;

Route::post(
    '/admin/supprimer-offre-par-id',
    [Admin::class, 'supprimerOffre']
    )->name('post.admin.supprimer.offre')
;

Route::post(
    '/admin/supprimer-employes-par-id',
    [Admin::class, 'supprimerEmploye']
    )->name('post.admin.supprimer.employes')
;

// 




//La route de gestion des demandes d'emplois  par l'administrateur
Route::get(
    '/admin/candidatures',
    [Admin::class, 'candidatures']
    )->name('admin-candidatures')->middleware('adminauth')
;


//Admin : new admin
Route::post('/admin/ajouter/nouvel-admin', [AdminController::class, 'nouvelAdmin'])->name('admin.ajouter.admin');


//Post de connexion appel via ajax pour la connexion 
Route::post(
    '/admin/connexion', 
    [Admin::class, 'connexion'])->name('admin.connexion')
;



/*
|--------------------------------------------------------------------------
| Fin Web Routes Adminis
|--------------------------------------------------------------------------
*/


###################################################################################
/*
|-----------------------------------------------------------------------------------------
| Web Routes Employes : Get et Post pour les actions des employes et utilisateurs du système
|--------------------------------------------------------------------------------------------
|
| On utilisant le controller Employes pour lancer les différente pages de l'employes 
| Et le différents traitement et appel ajax depuis les pages employes
 */


 /*
|--------------------------------------------------------------------------
| Fin Web Routes Employes
|--------------------------------------------------------------------------
*/

//La route de gestion des offres d'emplois  par l'administrateur
Route::get(
    '/',
    [EmployeController::class, 'index']
    )->name('employe.home')
;