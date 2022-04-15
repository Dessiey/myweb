@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Slide Details
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.slide.fields.id') }}
                        </th>
                        <td>
                            {{ $slide->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slide.fields.name') }}
                        </th>
                        <td>
                            {{ $slide->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slide.fields.faculty') }}
                        </th>
                        <td>
                            {{ $slide->faculty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slide.fields.degreetype') }}
                        </th>
                        <td>
                            {{ $slide->degreetype }}
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slide.fields.college') }}
                        </th>
                        <td>
                            {{ $slide->college }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slide.fields.phone') }}
                        </th>
                        <td>
                            {{ $slide->phone }}
                        </td>
                   
                    <tr>
                        <th>
                            Services
                        </th>
                        <td>
                            @foreach($slide->services as $id => $services)
                                <span class="label label-info label-many">{{ $services->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection