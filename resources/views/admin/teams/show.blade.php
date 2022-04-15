@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Team Memeber Details
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
ID                        </th>
                        <td>
                            {{ $team->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
Name                        </th>
                        <td>
                            {{ $team->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            position                        </th>
                        <td>
                            {{ $team->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
facebook link                        </th>
                        <td>
                            {{ $team->fb }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
Linkedin link                        </th>
                        <td>
                            {{ $team->linkedin }}
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