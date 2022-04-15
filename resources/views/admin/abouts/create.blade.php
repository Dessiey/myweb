@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.about.title_singular') }}
    </div>
 
    <div class="card-body">
        <form action="{{ route("admin.abouts.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('strategies') ? 'has-error' : '' }}">
                <label for="strategies">Strategies</label>
                <textarea
                        placeholder="Describe  here...like Strategies"
                        id="strategies" name="strategies" minlength="10" maxlength="300" class="form-control "
                         ></textarea>
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
                <input type="text" id="comprises" name="comprises" class="form-control" value="{{ old('amname', isset($about) ? $about->amname : '') }}"  >
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
                <textarea
                        placeholder="Describe  here... vision"
                        id="vision" name="vision" minlength="10" maxlength="300" class="form-control "
                         ></textarea>
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
                <input type="text" id="mission" name="mission" class="form-control"  >
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
                <input type="text" id="establishment" name="establishment" class="form-control">
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
                <input type="text" id="happyclients" name="happyclients" class="form-control">
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
                <input type="text" id="projects" name="projects" class="form-control">
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
                <input type="text" id="publication" name="publication" class="form-control">
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
                <input type="text" id="experiance" name="experiance" class="form-control">
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
                <input type="text" id="awards" name="awards" class="form-control">
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