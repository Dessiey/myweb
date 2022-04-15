@extends('layouts.app')
@section('content')

    <head>
        <center> <br>
            <h4 class="font-17 m-b-5 text-center"><img src="frontend/assets/img/JUlogo.jpg" style="width:50px;height:50px;" alt="LOGO">
                <b>JU-MYWEB </b></h4>
        </center>
    </head>
    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (\Session::has('message'))
                            <p class="alert alert-info">
                                {{ \Session::get('message') }}
                            </p>
                        @endif


                        <form method="POST" action="">
                            {{ csrf_field() }}
                            @csrf
                         
                            <h5> <b>SIGN UP</b> </h5>
                            <hr>
                         
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                                <input type="text" id="name" name="name" placeholder="Your Full Name" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                                @if ($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.name_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                                <input type="email" id="email" name="email" placeholder="Your Email" class="form-control"
                                    value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                                @if ($errors->has('email'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.email_helper') }}
                                </p>
                            </div>
                            <label for="password">Password</label>
                            <div class="input-group mb-3">

                                <input name="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required
                                    placeholder="{{ trans('global.login_password') }}">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            @csrf
                            <label for="confirmation">Confirm Password</label>

                            <div class="form-group has-feedback">
                                <input type="password" name="password_confirmation" class="form-control" required
                                    placeholder="{{ trans('global.login_password_confirmation') }}">
                                @if ($errors->has('password_confirmation'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('password_confirmation') }}
                                    </em>
                                @endif
                            </div>
                            @csrf
                            <label for="usertype">Which one discribes you more</label>
                            {{-- <div class="col-md-8 inputGroupContainer"> --}}
                            {{-- <div class="input-group"> --}}
                            <select name="usertype" required>
                                <option value="" selected>...Select...</option>
                                <option value="Researcher">Researcher</option>
                                <option value="Employer">Officer</option>
                                <option value="Student">Student</option>
                                <option value="Other">Other</option>
                            </select>
                            {{-- </div> --}}
                            {{-- </div> --}}
                            <div class="input-group mb-4">
                                <div class="form-check checkbox">
                                    <input type="checkbox" name="checkagree" required value="checked" id="checkagree" /> I
                                    have read and agree to the Terms and Conditions
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4">
                                        {{ trans('global.signin') }}
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-link px-0" href="{{ route('login') }}" class="text-muted">
                                        Sign in instead
                                    </a>

                                </div>

                            </div>                 

                        </form>
                    </div>
                    <hr>
                    <span class="font-17 m-b-5 text-center">
                        <center> &copy; {{ date('Y') }}. <a href="">JU-MYWEB</a>
                        </center>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
