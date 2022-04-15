@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Create Facility
        </div>
        <div class="card-body">
            <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name of Facility</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name', isset($facility) ? $facility->name : '') }}">
                    @if ($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    
                </div>
                @csrf
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Short {{ trans('cruds.certificate.fields.description') }} <b>*</b></label><br>
                    <textarea
                        placeholder="Short Description  here....."
                        id="description" name="description" minlength="5" maxlength="255" class="form-control "
                        required></textarea>
                    @if ($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.certificate.fields.description_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('facimage') ? 'has-error' : '' }}">
                    <label for="facimage">Upload Picture of the Facility <small></small></label>

                    <input type="file" id='facimage' name="facimage" class="form-control" required>
                    {{ old('facimage', isset($facility) ? $facility->imageid : '') }}

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
