<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Supporter extends Model
{
    use SoftDeletes, HasFactory, Loggable;

    public $table = 'supporters';



    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'logoid',
        'amount',
        'status',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function preparedby()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
