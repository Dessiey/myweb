<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class About extends Model
{
    use SoftDeletes, HasFactory, Loggable;

    public $table = 'abouts';



    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'strategies',
        'comprises',
        'vision',
        'mission',
        'establishment',
        'happyclients',
        'projects',
        'publication',
        'experiance',
        'awards',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


   }
