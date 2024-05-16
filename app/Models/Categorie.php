<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Voiture;

class Categorie extends Model
{
    use HasFactory;



    use SoftDeletes;
    protected $fillable = [
        'mark',
        'categorie',    
    ];


    public function voitures(){
        return $this->hasMany(Voiture::class,'categorie_id','id');
    }



}
