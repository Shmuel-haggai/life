<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Lien
 * @package App\Models\Admin
 * @version November 2, 2021, 8:28 am UTC
 *
 * @property string $url
 * @property string $nom
 * @property integer $liste_id
 */
class Lien extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'liens';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'url',
        'nom',
        'liste_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'url' => 'string',
        'nom' => 'string',
        'liste_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'url' => 'required',
        'nom' => 'required',
        'liste_id' => 'required'
    ];

    public function liste(){
        return $this->belongsTo(Liste::class);
    }


}
