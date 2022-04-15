@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
Show Supporter
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.supporter.fields.id') }}
                        </th>
                        <td>
                            {{ $supporter->id }}
                        </td>
                    </tr>
         
                    <tr>
                        <th>
                           name
                        </th>
                        <td>
                            {{ $supporter->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Amount
                        </th>
                        <td>
                            {{ $supporter->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Logo
                        </th>
                        <td>
                            {{ $supporter->logoid }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                           Status
                        </th>
                        <td>
                            {{ $supporter->status ?? '' }}
                        </td>
                    </tr>
                                      
                    <tr>
                        <th>
                            Created BY
                        </th>
                        <td>
                            {{ $supporter->user_id }}

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Createed at
                        </th>
                        <td>
                            {{ $supporter->created_at }}

                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
            <a style="margin-top:20px;" class="btn btn-success" href="" target="_blank">
                {{ trans('global.generate') }}
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