<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Jago
 * @package App\Models\Admin
 * @version November 2, 2021, 10:38 am UTC
 *
 * @property string $nom
 * @property string $prenom
 */
class Jago extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jagos';
    

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
