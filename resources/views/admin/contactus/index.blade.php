@extends('layouts.admin')
@section('content')
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('status') }}
    </div>
@endif
{{-- @can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.contactus.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
            <a  href="{{ route("admin.contactus.create") }}">

            </a>
        </div>
    </div>
@endcan --}}
@can('user_access')
<div class="card">
    <div class="card-header">
Contact Us Messages    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">
ID
                        </th>
                       
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            Subject
                        </th>
                        <th>
                            Message
                        </th>
                        <th>
                            Date
                        </th>
                        
                        <th>
                        <span class="supporter supporter-sucess">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactus as $key => $value)
                        <tr data-entry-id="{{ $value->id }}">
                            <td>
                            </td>
                            
                            <td>
                                {{ $value->name ?? '' }}
                            </td>
                            <td>
                                {{ $value->email ?? '' }}
                            </td>
                            <td>
                                {{ $value->subject ?? '' }}
                            </td>
                            <td>
                                {{ $value->messege ?? '' }}
                            </td>
                            <td>
                                {{ $value->created_at ?? '' }}
                            </td>
                                                   
                            <td>
                            @if ($value->status!="deactivated")
                                {{-- @can('user_show') --}}
                                    {{-- <a class="btn btn-xs btn-primary" href="{{ route('admin.contactus.show', $value->id) }}">
                                        {{ trans('global.view') }}
                                    </a> --}}
                                {{-- @endcan --}}

                                {{-- @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.contactus.edit', $user->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan --}}

                                @can('user_delete')
                                    <form action="{{ route('admin.contactus.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="deactivate">
                                    </form>
                                @endcan
                             @endif
                            </td>
                           

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contactus.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
//   dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endcan
@endsection