<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'applications';

    

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
            'fullName',
            'gender',
            'city',
            'cgpa',
            'confcode',
            'region',   
            'postcode',   
            'country',   
            'status',   
            'phoneNumber',   
            'email',   
            'doctype',   
            'admtype',   
            'insname',   
            'insregion',   
            'stuid',   
            'filstudy',   
            'entday',   
            'graday',
            'user_id',   
            'checkagree',   
            'uploadedfile',   
            'created_at',
            'updated_at',
            'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
