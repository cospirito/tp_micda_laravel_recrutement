<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Administrateurs as Admin;
use App\OffreEmplois as Offre;
use App\Employes as Empoye;
use App\Postuler as Postuler;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * La methode index s'execute immédiation à l'appel du controller
     * 
     * @author Marc Guei
     * @return void
     */
    public function index(Request $request)
    {
        $nb_cand =  DB::select('
            select count(*) nb_cand from postuler
        ');
        $nb_employes =  DB::select('
            select count(*) nb_employes from employes
        ');
        $nb_emplois =  DB::select('
            select count(*) nb_emplois from offre_emplois
        ');
        

        return view('/admin/home')->with(['nb_cand' => $nb_cand, 'nb_employes' => $nb_employes, 'nb_emplois' => $nb_emplois]);
    }

     /**
     * login : Page de connexion pour accéder à la page admin
     *
     * @author Marc Guei
     * @return void
     */
    public function login()
    {
        return view('/admin/pages/login');
    }

    /**
     * logout
     * @author Marc Guei
     * @return void
     */
    public function logout()
    {
        //Deconnexion admin 
        auth()->guard('webadmin')->logout();

        //Redirection login page
        return redirect(route('admin-login'));
    }

    /**
     * connexion : Appel post via ajax pour la connexion de l'admin
     * @author Marc Guei
     * @param  mixed $request
     * @return void
     */
    public function connexion(Request $request)
    {
        //Connexion admin panel
        $login = $request->input('login');
        $pwd = $request->input('pwd');
        
        # 1. On récupère l'utilisateur à partir de l'adresse email
        $admin = Admin::where("login", $login)->first();

        if (isset($admin)) {
            if(Hash::check($pwd, $admin->pwd))
            {                
                #On connecte l'administrateur
                Auth::guard('webadmin')->login($admin);

                return response(['url'=> route('admin-home')], 200);
            }
            else {
                #Le mot de passe user est incorrect
                $response = ["type" => "pwd", "message" => "Mot de passe incorrecte"];
                return response($response, 422);
            }
        }
        else {
            #le login ou l'email est introuvable
            $response = ["type" => "login", "message" => "Login incorrecte"];
            return response($response, 422);
        }

    }

    /**
     * params
     *
     * @author Marc Guei
     * @return void
     */
    public function params()
    {
        return view('/admin/pages/admin-params');
    }

    /**
     * employes :  Accéder à la page d'employes
     *
     * @author Marc Guei
     * @return void
     */
    public function employes()
    {
        $employe = new Empoye;
        $employedata = $employe->get();
        return view('/admin/pages/employes')->with('employes', $employedata);
    }

    /**
     * employes :  Accéder à la page des offres 
     *
     * @author Marc Guei
     * @return void
     */
    public function offres($etat)
    {
        $offre = new Offre;

        switch($etat)
        {
            case "expiré":
                $offredata = $offre->where('etat', 'expiré')->get();
                return view('/admin/pages/offresexpire')->with('offres', $offredata);
                break;
            case "non_expiré":
                $offredata = $offre->where('etat', 'non_expiré')->get();
                return view('/admin/pages/offresencours')->with('offres', $offredata);
                break;
        }
    }
    
    /**
     * modifierOffre
     *
     * @param  mixed $request
     * @return void
     */
    public function modifierOffre(Request $request)
    {
        $offre = new Offre;
        
        $offre = $offre->where('id', $request->input('id'))->first();
        
        if(isset($offre)){
            //on modifie
            $offre->titre =  ucfirst($request->input('titreOffre'));
            $offre->description =  strtoupper($request->input('descOffre'));
            $offre->etat =  $request->input('etat');

            $offre->save();
            $response = ["type" =>"ok", "message" =>"Offre modifié avec succès"];
            return response($response, 200);
        }
        else {
            $response = ["type" =>"ko", "message" =>"Offre inexistant"];
            return response($response, 200);
        }

    }


    
    /**
     * supprimerOffre
     *
     * @param  mixed $request
     * @return void
     */
    public function supprimerOffre(Request $request)
    {
        $offre = new Offre;
        $postuler = new Postuler;

        $offrefind = $offre->where('id', $request->input('id'))->first();
        
        if(isset($offrefind)){
            $postul = $postuler->where('offre_emplois', $offrefind->id)->get()->toArray();
            // dd($postul);

            if(isset($postul)){
                // $postul
                foreach($postul as $k => $v){
                    $postuler->destroy($v["id"]);
                }
            }
            
            $offrefind->delete();
            $response = ["type" =>"ok", "message" =>"Offre supprimé avec succès"];
            return response($response, 200);
        }
        else {
            $response = ["type" =>"ko", "message" =>"Offre inexistant"];
            return response($response, 200);
        }

    }
    
    /**
     * supprimerEmploye
     *
     * @param  mixed $request
     * @return void
     */
    public function supprimerEmploye(Request $request)
    {
        $postuler = new Postuler;
        $employe = new Empoye;

        $employefind = $employe->where('id', $request->input('id'))->first();
        
        if(isset($employefind)){
            $postul = $postuler->where('employe', $employefind->id)->get()->toArray();
            // dd($postul);

            if(isset($postul)){
                // $postul
                foreach($postul as $k => $v){
                    $postuler->destroy($v["id"]);
                }
            }
            
            $employefind->delete();
            $response = ["type" =>"ok", "message" =>"Employe supprimé avec succès"];
            return response($response, 200);
        }
        else {
            $response = ["type" =>"ko", "message" =>"Employe inexistant"];
            return response($response, 200);
        }

    }

    // supprimerEmploye

    /**
     * employes :  Postuler emplois  
     *
     * @author Marc Guei
     * @return void
     */
    public function postes($etat)
    {
        return view('/admin/pages/offres.encours');
    }

     /**
     * employes :  Candidature  
     *
     * @author Marc Guei
     * @return void
     */
    public function candidatures()
    {
       $cand =  DB::select('
            select e.nom, e.tel, e.email, oe.titre
            from postuler p
            inner join offre_emplois oe on oe.id=p.offre_emplois
            inner join employes e on e.id=p.employe
        ');

        return view('/admin/pages/candidature')->with('canditatures', $cand);
    }

        
    /**
     * nouelOffre
     *
     * @param  mixed $request
     * @return void
     */
    public function nouvelOffre(Request $request)
    {
        //
        //Offre
        //Nouvelle instance de ecole
        $offre = new Offre;

        //Ajouter
        $offre->titre =  ucfirst($request->input('titreOffre'));
        $offre->description =  strtoupper($request->input('descOffre'));
        $offre->etat =  'non_expiré';

        //On ajoute la nouvelle offre
        $offre->save();
        $response = ["type" =>"ok", "message" =>"Offre ajoutée avec succès"];
        return response($response, 200);

    }

        
    /**
     * ajouterOffres
     *
     * @return void
     */
    public function ajouterOffres(){
        return view('/admin/pages/ajouteroffres');
    }

     
    /**
     * defaulNouvellAdmin : Nous permet de créer rapidement un nouveau admin avec un pwd hasher
     * @author Marc Guei
     * @return void
     */
    public function defaulNouvellAdmin()
    {
        //Si le login existe
        $admin = new Admin;
        $inputAdminlogin = '_recrzoneadmin';
        $cadmin = $admin->where('login', $inputAdminlogin)->first();
        
        if(!isset($cadmin))
        {
            
            //On enregistre les infos du nouvel admin
            // 'nom', 'pwd', 'email', 'login','prenoms', 'contact','contact',
            $admin->nom =  'Default';
            $admin->prenoms =  strtoupper('Default');
            $admin->pwd =  Hash::make('_recrzoneadmin');
            $admin->email =  '_recrzoneadmin@admin.com';
            $admin->login =  '_recrzoneadmin';

            //On ajoute la nouvelle admin
            $admin->save();
            
        }
    }
}