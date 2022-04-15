@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.item.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.items.update", [$item->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('projectname') ? 'has-error' : '' }}">
                <label for="projectname">project name</label>
                <input type="text" id="projectname" name="projectname" class="form-control" value="{{ old('projectname', isset($item) ? $item->projectname : '') }}">
                @if($errors->has('projectname'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.item.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('itemname') ? 'has-error' : '' }}">
                <label for="name">Item Name</label>
                <input type="text" id="itemname" name="itemname" class="form-control" value="{{ old('name', isset($item) ? $item->itemname : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.item.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">Amount (quantity)</label>
                <input type="text" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($item) ? $item->amount : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.item.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('usedby') ? 'has-error' : '' }}">
                <label for="usedby">Who is using the Item?</label>
                <input type="text" id="usedby" name="usedby" class="form-control" value="{{ old('usedby', isset($item) ? $item->usedby : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.item.fields.name_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection