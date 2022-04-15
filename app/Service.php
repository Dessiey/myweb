<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;



class Service extends Model
{
    use SoftDeletes, HasFactory,Loggable;

    public $table = 'services';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'service_code',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function othercertificates()
    {
        return $this->belongsToMany(OtherCertificate::class);
    }

    public function certificates()
    {
        return $this->belongsToMany(certificate::class);
    }
    // public function tempodegreechain()
    // {
    //     return $this->belongsToMany(Tempodegreechain::class);
    // }
}
