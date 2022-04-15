@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.supporter.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.supporters.update", [$supporter->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title">Name</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('supporter', isset($supporter) ? $supporter->name : '') }}">
                @if ($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                
            </div>
            @csrf
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="title">Amount</label>
                <input type="text" id="amount" name="amount" class="form-control"
                    value="{{ old('supporter', isset($supporter) ? $supporter->amount : '') }}">
                @if ($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                
            </div>
            <div class="form-group {{ $errors->has('slideimage1') ? 'has-error' : '' }}">
                <label for="slideimage1">Upload Picture of the slider <small></small></label>

                <input type="file" id='slideimage1' name="slideimage1" class="form-control" >
                {{ old('slideimage1', isset($supporter) ? $supporter->logoid : '') }}

            </div>
            @csrf
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status"> Status <small>/ you can make active your signature/</small></label>
            <select name="status" id="status" class="form-control select1">
               
                <option value="" selected  disabled> {{ old('status', isset($supporter) ? $supporter->status : '') }}</option>             
                <option value="active" >active 	</option>
                <option value="disable"> disabled </option>
            
            <!-- <option>To Whom It May Concern</option> -->
            </select>
            
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')

@stop