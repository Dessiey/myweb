<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;



class Facility extends Model
{
    use SoftDeletes, HasFactory,Loggable;

    public $table = 'facilities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'imageid',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

  }
