<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Photo
 * @package App\Models\Admin
 * @version November 2, 2021, 8:09 am UTC
 *
 * @property string $url
 * @property integer $liste_id
 */
class Photo extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'photos';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'url',
        'liste_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'url' => 'string',
        'liste_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'url' => 'required',
        'liste_id' => 'required'
    ];

    public function liste(){
        return $this->belongsTo(Liste::class);
    }


}
