<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use App\Key;
use DateTime;
use Andegna;
use App\Contactus;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ContactusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $userid=auth()->user()->id;
        if($userid==1){
        $contactus = Contactus::get();
        }
        else{
            $contactus = Contactus::where('id',$userid)->get();
            }
            // dd($contactus);
        return view('admin.contactus.index', compact('contactus'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }
    public function generateRandomString($length = 8) {
        $characters = '#@0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
       // $randomString=utf8_encode($randomString);
        return $randomString;
    }
    public function store(StoreUserRequest $request)
    {
        $userobj=new UsersController();

                $myate = new DateTime();
                $gerdate1=$myate->format('M d Y');

        $ethiopic = Andegna\DateTimeFactory::fromDateTime($myate);
        $ethiopicvalue1= $ethiopic->format('F j ቀን Y');
        $autopassword=$userobj->generateRandomString();
        $request->request->add(['password' =>$autopassword]);
        $request->request->add(['status' =>"active"]);
        $username=$request->input('email');
        $position=$request->input('position');
        $lable=$request->input('lable');
        $user = User::create($request->all());
        // dd($request->roles);
        $user->roles()->sync($request->input('roles', []));
        
        
        event(new Registered($user));

        Auth::login($user);

        $private = \phpseclib3\Crypt\RSA::createKey();
        $public = $private->getPublicKey();

        Key::create([
            'public_key' => $public->toString('PKCS8'),
            'private_key' => $private->toString('PKCS8'),
            'user_id' => $user->id
        ]);

  return view('admin.users.printit', ['passcode' => $autopassword,
  'username'=>$username,
  'position'=>$position,
  'lable'=>$lable,
  'privatekey'=>$private,
   'givendate'=>$ethiopicvalue1]);

        // return redirect()->route('admin.user.printit');
    }
    public function usermanual(){
        return view('admin.users.usermanual');
       }
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->validate($request, [
            'email' => 'email',
            'password' => 'required|confirmed|min:6',
        ]);
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(Contactus $contactus)
    {
        // abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $user->load('roles');
dd($contactus);
        return view('admin.contactus.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $updateuser = User::where('id',$user->id)->update(['status' => 'deactivated']);

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function deactivateUser($id)

    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users  = \DB::table('users')->where('id',$id) ->get(); 

        foreach ($users  as $userval) {
            $status=$userval->status;
        }
        if($status=="active"){
        $updateCertificate = User::where('id',request('id'))->update(['status' => 'deactivated']);
        }
        else {
            $updateCertificate = User::where('id',request('id'))->update(['status' => 'active']);
            }
        
    return redirect()->route('admin.users.index')->with('status', 'User Status Changed!');

    
    }

    public function printit($id)
    {
        $user  = \DB::table('users')->where('id',$id) ->get(); 
        foreach ($user as $userval) {
            $PWD=$userval->password;
            $username=$userval->username;
            $dateval= $userval->created_at;

        }
        

    }
}
