@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
Edit Setting
    </div>

    <div class="card-body">
        <form action="{{ route("admin.teams.update", [$team->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', isset($team) ? $team->name : '') }}">
                @if ($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                
            </div>
            @csrf
            <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                <label for="position">Position</label>
                <input type="text" id="position" name="position" class="form-control"
                    value="{{ old('position', isset($team) ? $team->position : '') }}">
                @if ($errors->has('position'))
                    <em class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </em>
                @endif
                
            </div>      
            @csrf
            <div class="form-group {{ $errors->has('fb') ? 'has-error' : '' }}">
                <label for="fb">Facebook Link</label>
                <input type="text" id="fb" name="fb" class="form-control"
                    value="{{ old('fb', isset($team) ? $team->fb : '') }}">
                @if ($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                
            </div>
            @csrf
            <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                <label for="twitter">Twitter Link</label>
                <input type="text" id="twitter" name="twitter" class="form-control"
                    value="{{ old('twitter', isset($team) ? $team->twitter : '') }}">
                @if ($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                
            </div>
            @csrf
            <div class="form-group {{ $errors->has('linkedin') ? 'has-error' : '' }}">
                <label for="linkedin">linkedin Link</label>
                <input type="text" id="linkedin" name="linkedin" class="form-control"
                    value="{{ old('linkedin', isset($team) ? $team->linkedin : '') }}">
                @if ($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                
            </div>
            <div class="form-group {{ $errors->has('photoid') ? 'has-error' : '' }}">
                <label for="photoid">Upload Picture of the teamr <small></small></label>

                <input type="file" id='photoid' name="photoid" class="form-control" >
                {{ old('photo', isset($team) ? $team->photo : '') }}

            </div>
            <hr>
            @csrf
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status"> Status <small>/ you can make active your signature/</small></label>
            <select name="status" id="status" class="form-control select1">
               
                <option value="" selected  disabled>----change status---</option>             
                <option value="active" >active 	</option>
                <option value="disable"> disabled </option>
            
            <!-- <option>To Whom It May Concern</option> -->
            </select>
            
            </div>
            <div>
                <input class="btn btn-info" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')

@stop