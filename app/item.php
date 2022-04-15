<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class item extends Model
{
    use SoftDeletes, HasFactory;
 
    use Loggable;


    public $table = 'items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'projectname',
        'itemname',
        'amount',
        'usedby',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function certificates()
    {
        return $this->hasMany(certificate::class, 'item_id', 'id');
    }
    
    public function Supporters()
    {
        return $this->hasMany(Supporter::class, 'item_id', 'id');
    }
}
