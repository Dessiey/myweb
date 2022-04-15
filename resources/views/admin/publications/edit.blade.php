@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.publication.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.publications.update", [$publication->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control"
                    value="{{ old('title', isset($publication) ? $publication->title : '') }}">
                @if ($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                
            </div>
            @csrf
            <div class="form-group {{ $errors->has('pubyear') ? 'has-error' : '' }}">
                <label for="pubyear">Year of Publication *</label>
                <input type="date" name="pubyear"  value="{{ old('pubyear', isset($publication) ? $publication->pubyear : '') }}"> G.C

                @if ($errors->has('entday'))
                    <em class="invalid-feedback">
                        {{ $errors->first('entday') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.entday_helper') }}
                </p>
            </div>
            @csrf
            <div class="form-group {{ $errors->has('abstract') ? 'has-error' : '' }}">
                <label for="abstract">Abstract <b>*</b></label><br>
                <textarea
                    id="abstract" name="abstract" minlength="10" maxlength="1000" class="form-control "
                    required> {{ old('abstract', isset($publication) ? $publication->abstract : '') }}</textarea>
                @if ($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.certificate.fields.description_helper') }}
                </p>
            </div>
            @csrf
            <div class="form-group {{ $errors->has('paperlink') ? 'has-error' : '' }}">
                <label for="paperlink">link to the paper</label>
                <input type="text" id="paperlink" name="paperlink" class="form-control"
                    value="{{ old('paperlink', isset($publication) ? $publication->paperlink : '') }}">
                @if ($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                
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