<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OffreEmplois extends Model
{

    //Le nom de la table n'est pas onligé car le modèle porte dejà le nom de la table
    public $table = "offre_emplois";
    protected $primaryKey = 'id';

    /**
     * Les attributs pour une assignation en masse.
     *
     * @author Marc Guei
     * @var array
     */
    protected $fillable = [
        'titre', 'description','etat',
    ];
}
