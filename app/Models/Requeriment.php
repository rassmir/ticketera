<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requeriment extends Model
{
    use HasFactory;

//    public $incrementing = false;
//
//    public static function boot()
//    {
//        parent::boot();
//        self::creating(function ($model) {
//            $model->id = IdGenerator::generate(['table' => $this->table, 'length' => 8, 'prefix' => date('y')]);
//        });
//    }
}
