<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class certifier extends Model
{
    use SoftDeletes, HasFactory;
 
    use Loggable;


    public $table = 'certifiers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'phone',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function certificates()
    {
        return $this->hasMany(certificate::class, 'certifier_id', 'id');
    }
    
    public function Badges()
    {
        return $this->hasMany(Badge::class, 'certifier_id', 'id');
    }
}
