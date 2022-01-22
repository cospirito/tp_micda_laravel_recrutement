<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrateurs extends Authenticatable
{
    public $table = "administrateurs";
    protected $primaryKey = 'id';

     /**
     * Les attributs pour une assignation en masse.
     *
     * @author Marc Guei
     * @var array
     */
    protected $fillable = [
        'login','pwd', 'email', 'tel', 'nom',  'prenoms',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * * @author Marc Guei
     * @var array
     */
    protected $hidden = [
        'pwd', 'remember_token',
    ];

    /**
     * username
     *
     * * @author Marc Guei
     * @return void
     */
    public function username()
    {
        return 'login';
    }
}
