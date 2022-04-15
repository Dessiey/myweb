@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} Message
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            College/University
                        </th>
                        <td>
                        {{ $user->lable ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Position
                        </th>
                        <td>
                            {{ $user->position }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            Status 
                        </th>
                        <td>
                           <b> {{ $user->status }} </b>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            @if ($user->status!="deactivated")
            <a  style="margin-top:20px;" class="btn btn-secondary" href="{{url('admin.users.massDestroy')}}">
                Deactiviate
                
            </a>
          @endif
          {{-- @if ($user->status!="active")
            <a  style="margin-top:20px;" class="btn btn-secondary" href="{{url('admin/user/destroy')}}">
                Activiate
                
            </a>
          @endif --}}
        </div>


    </div>
</div>
@endsection