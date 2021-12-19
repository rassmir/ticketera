<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAnulation extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'number_ticket',
        'date_anulation',
        'hour',
        'patient',
        'name_doctor',
        'phone1',
        'phone2',
        'response_anulation',
        'date_load',
        'date_close',
        'tiphication',
        'executive',
        'date_gestion',
        'trys'
    ];
}
