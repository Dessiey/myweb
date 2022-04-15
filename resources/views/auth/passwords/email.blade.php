@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                <div class="p-3">
                
                                  <h3 class="text-muted font-18 mb-3 text-center">JU-CVMS</h3> 
                            <hr>
                        <h4 class="text-muted font-18 mb-3 text-center">Reset Password</h4>
                        <div class="alert alert-info" role="alert">
                            Enter your Email and instructions will be sent to you!
                        </div>
                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
        
                        <p class="text-muted"></p>
                        <div>
                            {{ csrf_field() }}
                        
                        <div class="form-group has-feedback">
                                <label for="useremail">Email</label>
                                <input type="email" name="email" class="form-control" required="autofocus" placeholder="Enter Email">
                                @if($errors->has('email'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </em>
                                @endif
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit"> {{ trans('global.reset_password') }}</button>
                                </div>
                            </div>
                    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection