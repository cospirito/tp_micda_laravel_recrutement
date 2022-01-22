<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employes extends Authenticatable
{
    public $table = "employes";
    protected $primaryKey = 'id';

    /**
     * Les attributs pour une assignation en masse.
     *
     * @author Marc Guei
     * @var array
     */
    protected $fillable = [
        'nom','tel', 'email', 'pwd', 'cv','email_verifier_a',
    ];

    /**
     * Les attributs qui seront cachés dans le request 
     *
     * * @author Marc Guei
     * @var array
     */
    protected $hidden = [
        'pwd', 'remember_token',
    ];


    /**
     * username :  nom du chmap qui sera utiliser comme login de connexion de l'employe
     *
     * * @author Marc Guei
     * @return void
     */
    public function username()
    {
        return 'email';
    }
}
