<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Categorie;

class Voiture extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['mark','image','prix','disponible','categorie_id','discription','type'];


    // public function categorie(){
    //     return $this->hasMany(Categorie::class);
    // }

}
