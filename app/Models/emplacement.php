<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emplacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_emplacement',
    ];

    public function liste(){
        return $this->hasMany(Liste::class);
    }
}
