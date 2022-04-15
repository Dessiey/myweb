@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.about.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            strategies
                        </th>
                        
                        <td>
                            {{ $about->strategies }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            comprises

                        </th>
                        
                        <td>
                            {{ $about->comprises }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            vision

                        </th>
                        
                        <td>
                            {{ $about->vision }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            mission

                        </th>
                        
                        <td>
                            {{ $about->mission }}
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <th>
                            establishment

                        </th>

                       
                        <td>
                            {{ $about->establishment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            happyclients

                        </th>
                        
                        <td>
                            {{ $about->happyclients }}
                        </td>
                   
                    <tr>
                        <th>

                            projects
                        </th>
                        
                        <td>
                            {{ $about->projects }}
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