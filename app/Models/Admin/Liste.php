<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Liste
 * @package App\Models\Admin
 * @version November 2, 2021, 10:58 am UTC
 *
 * @property string $nom
 * @property string $frequence
 * @property string $indication
 * @property string $emplacement
 */
class Liste extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'listes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'frequence',
        'indication',
        'emplacement'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function liens(){
        return $this->hasMany(Lien::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }



}
