<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Program extends Model 
{
    use SoftDeletes, HasFactory, Loggable;

    public $table = 'programs';

    

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'amname',
        'degreetype',
        'amdegreetype',
        'faculty',
        'college',
        'phone',
        'service',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    

    public function certificates()
    {
        return $this->hasMany(certificate::class, 'program_id', 'id');
    }


    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
