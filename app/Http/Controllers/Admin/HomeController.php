<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\App;

class HomeController
{
     public function index()
    {
     //   $useridvalue=auth()->user()->id;

        return view('home');
    }
}
