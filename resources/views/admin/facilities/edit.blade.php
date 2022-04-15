@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
Edit Facility
    </div>

    <div class="card-body">
        <form action="{{ route("admin.facilities.update", [$facility->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">name of facility</label>
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
                   id="description" name="description" minlength="10" maxlength="255" class="form-control "
                    value="{{ old('description', isset($facility) ? $facility->description : '') }}" > {{ old('description', isset($facility) ? $facility->description : '') }}</textarea>
                @if ($errors->has('des'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.certificate.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('imageid') ? 'has-error' : '' }}">
                <label for="imageid">Upload Picture of Facility <small></small></label>

                <input type="file" id='facimage' name="facimage" class="form-control">
                {{ old('imageid', isset($facility) ? $facility->imageid : '') }}

            </div>
@csrf
<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status"> Status <small>/ you can change status of slider image/</small></label>
<select name="status" id="status" class="form-control select1">
   
    <option value="{{ old('status', isset($slide) ? $slide->status : '----change status---') }}" selected disabled>{{ old('status', isset($slide) ? $slide->status : '----change status---') }}</option>             
    <option value="active">active 	</option>
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