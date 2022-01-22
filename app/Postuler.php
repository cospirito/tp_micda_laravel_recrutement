<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postuler extends Model
{
    public $table = "postuler";
    protected $primaryKey = 'id';

    /**
     * Les attributs pour une assignation en masse.
     *
     * @author Marc Guei
     * @var array
     */
    protected $fillable = [
        'offre_emplois','employe', 'datepost',
    ];
}
