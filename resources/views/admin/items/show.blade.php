@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.item.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.id') }}
                        </th>
                        <td>
                            {{ $item->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Item Name
                        </th>
                        <td>
                            {{ $item->itemname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Project Name
                        </th>
                        <td>
                            {{ $item->projectname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Amount
                        </th>
                        <td>
                            {{ $item->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Who is using it?
                         </th>
                         <td>
                             {{ $item->usedby }}
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