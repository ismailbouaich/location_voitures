<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'voiture_id',
        'debut_dmd',
        'fin_dmd',
        'prixT',
        'pick_up',
        'drop_off',
        'gps',
        'siege_auto',
        'progress',

    ];
}
