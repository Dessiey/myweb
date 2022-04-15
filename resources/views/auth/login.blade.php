@extends('layouts.app')
@section('content')
<head>     <center> <br>
    <h4 class="font-17 m-b-5 text-center">
       <b>MYWEB  </b></h4>
Admin Login
</center>
</head>
<div class="row justify-content-center">

    <div class="col-md-5">
        
        <div class="card-group"> 
            <div class="card p-3">
                <div class="card-body">
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('status') }}
    </div>
@endif
                    @if(\Session::has('message'))
                        <p class="alert alert-info">
                            {{ \Session::get('message') }}
                        </p>
                    @endif
                    
                
                     <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                                       
                                 
                         <p class="text-muted"> <h5> <b>LOG IN</b> </h5>
                          
                            <hr></p>
                        <label for="username">Username</label> 
                        <div class="input-group mb-3">
                         
                        <div class="input-group-prepend">
                           
                           
                            </div>
                            <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <label for="username">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                
                            </div>
                            <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="input-group mb-4">
                            <div class="form-check checkbox">
                               <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                                <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                    {{ trans('global.remember_me') }}
                                </label> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ trans('global.login') }}
                                </button>
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-link px-0" href="" class="text-muted">
                                    {{ trans('global.forgot_password') }}
                                </a>
                                <a class="btn btn-link px-0" href="{{ route('signup') }}" class="text-muted">
                                    SIGN UP
                                </a>

                            </div>

                                        
                            
                        
                        </div>

                    </form>
                </div>
                <hr>
                        <span class="font-17 m-b-5 text-center"><center> &copy; {{ date('Y') }}. <a href=""> MYWEB </a> 
                        </center></span>
            </div>
        </div>
    </div>
</div>
@endsection