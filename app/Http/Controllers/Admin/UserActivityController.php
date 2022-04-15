<?php

namespace App\Http\Controllers\Admin;

use App\certificate;
use App\Http\Controllers\Controller;

class UserActivityController extends Controller
{

    public function useractivity()
    {
        return redirect()->route('admin.user-activity');
    }
}
