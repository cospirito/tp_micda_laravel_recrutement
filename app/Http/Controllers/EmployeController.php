<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Employes as Employe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //
        return view('employe.pages.login');
    }

    /**
     * connexion : Appel post via ajax pour la connexion de l'employe
     *
     * @param  mixed $request
     * @return void
     */
    public function connexion(Request $request)
    {
        //Connexion de l'employe
        $login = $request->input('login');
        $pwd = $request->input('pwd');
        
        # 1. On récupère l'utilisateur à partir de l'adresse email
        $employe = Employe::where("login", $login)->first();

        if (isset($employe)) {
            if(Hash::check($pwd, $employe->pwd))
            {                
                #On connecte l'employe
                Auth::guard('webemploye')->login($employe);

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

    
}
