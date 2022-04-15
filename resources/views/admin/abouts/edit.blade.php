@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.about.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.abouts.update", [$about->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('strategies') ? 'has-error' : '' }}">
                <label for="strategies">Strategies</label>
                <input type="text" id="strategies" name="strategies" class="form-control" value="{{ old('strategies', isset($about) ? $about->strategies : '') }}"  >
                @if($errors->has('strategies'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.about.fields.name_helper') }}
                </p>
            </div>
            @csrf
            <div class="form-group {{ $errors->has('comprises') ? 'has-error' : '' }}">
                <label for="comprises">Comprises</label>
                <input type="text" id="comprises" name="comprises" class="form-control" value="{{ old('comprises', isset($about) ? $about->comprises : '') }}"  >
                @if($errors->has('comprises'))
                    <em class="invalid-feedback">
                        {{ $errors->first('amname') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.about.fields.amname_helper') }}
                </p>
            </div>
            @csrf
            <div class="form-group {{ $errors->has('vision') ? 'has-error' : '' }}">
                <label for="vision">Vision</label>
                <input type="text" id="vision" name="vision" class="form-control" value="{{ old('vision', isset($about) ? $about->vision : '') }}"  >
                @if($errors->has('degreetype'))
                    <em class="invalid-feedback">
                        {{ $errors->first('degreetype') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.about.fields.degreetype_helper') }}
                </p>
            </div>

            @csrf
            <div class="form-group {{ $errors->has('mission') ? 'has-error' : '' }}">
                <label for="mission">Mission</label>
                <input type="text" id="mission" name="mission" class="form-control" value="{{ old('mission', isset($about) ? $about->mission : '') }}"  >
                @if($errors->has('amdegreetype'))
                    <em class="invalid-feedback">
                        {{ $errors->first('amdegreetype') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.about.fields.amdegreetype_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('establishment') ? 'has-error' : '' }}">
                <label for="establishment">Establishment</label>
                <input type="text" id="establishment" name="establishment" class="form-control" value="{{ old('establishment', isset($about) ? $about->establishment : '') }}"  >
                @if($errors->has('faculty'))
                    <em class="invalid-feedback">
                        {{ $errors->first('faculty') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.about.fields.college_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('happyclients') ? 'has-error' : '' }}">
                <label for="happyclients">Happy Clients in Number</label>
                <input type="text" id="happyclients" name="happyclients" class="form-control" value="{{ old('happyclients', isset($about) ? $about->happyclients : '') }}"  >
                @if($errors->has('college'))
                    <em class="invalid-feedback">
                        {{ $errors->first('college') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.about.fields.college_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('projects') ? 'has-error' : '' }}">
                <label for="projects">Projects in number</label>
                <input type="text" id="projects" name="projects" class="form-control" value="{{ old('projects', isset($about) ? $about->projects : '') }}"  >
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.about.fields.phone_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('publication') ? 'has-error' : '' }}">
                <label for="publication">Number of Publication</label>
                <input type="text" id="publication" name="publication" class="form-control" value="{{ old('publication', isset($about) ? $about->publication : '') }}"  >
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.about.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('experiance') ? 'has-error' : '' }}">
                <label for="experiance">experiance In number</label>
                <input type="text" id="experiance" name="experiance" class="form-control" value="{{ old('experiance', isset($about) ? $about->experiance : '') }}"  >
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.about.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('awards') ? 'has-error' : '' }}">
                <label for="awards">Awards</label>
                <input type="text" id="awards" name="awards" class="form-control" value="{{ old('awards', isset($about) ? $about->awards : '') }}"  >
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.about.fields.phone_helper') }}
                </p>
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