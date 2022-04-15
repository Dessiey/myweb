<?php

namespace App\Http\Controllers\webhome;

use App\About;
use App\Certificate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Key;
use App\Publication;
use App\Slide;
use App\Supporter;
use App\Contactus;
use App\Facility;
use App\Team;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{
    public function home()
    {
         $facilities  = Facility::all()->map->only('name', 'description','imageid');
         $teams  = Team::all()->map->only('name', 'position',
         'fb','linkedin','photo');

         $publications  = Publication::all()->map->only('title', 'abstract','paperlink','pubyear');
         $totalpub=count($publications);
         $suppporters  = Supporter::all()->map->only('name', 'amount','logoid');
         $abouts  = About::all()->map->only( 'strategies',
         'comprises',
         'vision',
         'mission',
         'establishment',
         'happyclients',
         'projects',
         'publication',
         'experiance',
         'awards');

       // dd( $publications);
        return view('frontend/index', compact('facilities','teams','abouts','publications','suppporters'));
    }
    public function facilities()
    {
        $facilities  = Facility::all()->map->only('name', 'description','imageid');

        $teams  = Team::all()->map->only('name', 'position',
        'fb','linkedin','photo');

        $publications  = Publication::all()->map->only('title', 'abstract','paperlink','pubyear');
        $totalpub=count($publications);
        $suppporters  = Supporter::all()->map->only('name', 'amount','logoid');
//dd($suppporters );
        $abouts  = About::all()->map->only( 'strategies',
        'comprises',
        'vision',
        'mission',
        'establishment',
        'happyclients',
        'projects',
        'publication',
        'experiance',
        'awards');

      // dd( $publications);
       return view('frontend/facilities', compact('slides','facilities','teams','abouts','publications','suppporters'));
   }
    public function storecontact(Request $request)
        {
        // dd($request);
        $newrequest = Contactus::create($request->all());

        return redirect()->back()->with('message',"\tYou Have sent Contact Us Messege, We will reach you soon  ");
    }
    public function conferences()
    {
        $publications  = Publication::all()->map->only('title', 'abstract','paperlink','pubyear');
        $totalpub=count($publications);
         $suppporters  = Supporter::all()->map->only('name', 'amount','logoid');
//dd($suppporters );
         $abouts  = About::all()->map->only( 'strategies',
         'comprises',
         'vision',
         'mission',
         'establishment',
         'happyclients',
         'projects',
         'publication',
         'experiance',
         'awards');

        return view('/frontend/conferences',compact('publications','suppporters'));
    }
    public function about()
    {
        $publications  = Publication::all()->map->only('title', 'abstract','paperlink','pubyear');
        $totalpub=count($publications);
         $suppporters  = Supporter::all()->map->only('name', 'amount','logoid');
//dd($suppporters );
         $abouts  = About::all()->map->only( 'strategies',
         'comprises',
         'vision',
         'mission',
         'establishment',
         'happyclients',
         'projects',
         'publication',
         'experiance',
         'awards');

        return view('/frontend/about',compact('publications','suppporters'));
    }
    public function trainings()
    {
        $publications  = Publication::all()->map->only('title', 'abstract','paperlink','pubyear');
        $totalpub=count($publications);
         $suppporters  = Supporter::all()->map->only('name', 'amount','logoid');
//dd($suppporters );
         $abouts  = About::all()->map->only( 'strategies',
         'comprises',
         'vision',
         'mission',
         'establishment',
         'happyclients',
         'projects',
         'publication',
         'experiance',
         'awards');

        return view('/frontend/trainings',compact('publications','suppporters'));
    }
    public function researches()
    {

        $publications  = Publication::all()->map->only('title', 'abstract','paperlink','pubyear');
        $totalpub=count($publications);
         $suppporters  = Supporter::all()->map->only('name', 'amount','logoid');
//dd($suppporters );
         $abouts  = About::all()->map->only( 'strategies',
         'comprises',
         'vision',
         'mission',
         'establishment',
         'happyclients',
         'projects',
         'publication',
         'experiance',
         'awards');

        return view('/frontend/researches',compact('publications','certificates','suppporters'));
    }
    public function webhome()
    {
        $teams  = Team::all()->map->only('name', 'position',
        'fb','linkedin','photo');

        $publications  = Publication::all()->map->only('title', 'abstract','paperlink','pubyear');
        $totalpub=count($publications);
        $suppporters  = Supporter::all()->map->only('name', 'amount','logoid');
//dd($suppporters );
        $abouts  = About::all()->map->only( 'strategies',
        'comprises',
        'vision',
        'mission',
        'establishment',
        'happyclients',
        'projects',
        'publication',
        'experiance',
        'awards');

    return view('frontend/index', compact('slides','teams','abouts','publications','suppporters'));
    }
    public function contactus()
    {
        return view('/frontend/contactus');
    }
    public function aboutweb()
    {
        return view('/frontend/aboutweb');
    }
    public function signup()
    {
        return view('/auth/signup');
    }

    public function storeuser(Request $request)
    {
        dd($request);
        $request->validate([
            'password' => 'required|confirmed|min:6',
            'email' => 'required|email|unique:users,email'
        ]);
        $rolesval = array(
            0 => "2"
        );
        $request->request->add(['status' => "active"]);
        $user = User::create($request->all());

        $user->roles()->sync($request->input('roles', $rolesval));
        
        return redirect()->back()->with('status', "You have created your account, SIGN IN to proceed");
    }
}
