<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Personne
 * @package App\Models\Admin
 * @version November 2, 2021, 10:44 am UTC
 *
 * @property string $nom
 * @property string $prenom
 */
class Personne extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'personnes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prenom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'prenom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'prenom' => 'required'
    ];

    
}
