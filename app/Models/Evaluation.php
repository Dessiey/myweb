<?php

namespace App\Models;
use app\Models\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Evaluation extends Model
{
   
    use SoftDeletes, HasFactory;

    public $table = 'evaluations';

    

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
            'app_id',
            'reqcode',
            'user_id',
            'status',
            'evaluateddoc',
            'doctyperesult',
            'fullNameresult',
            'gparesult',   
            'anymodificationexist',   
            'othercomment',   
            'confirmation',   
            'evaluatedobj',   
            'objencripted',   
            'digsign',    
           
    ];
public function appid()
{
    return $this->belongsTo(Application::class);

}

}