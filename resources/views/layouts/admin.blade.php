<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ trans('panel.site_title') }}</title>
    <link href="{{asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{asset('/css/all.css') }}" rel="stylesheet">
    <link href="{{asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{asset('/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{asset('/css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{asset('/css/select.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{asset('/css/coreui.min.css') }}" rel="stylesheet">
    <link href="{{asset('/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{asset('/css/dropzone.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">
           &nbsp;&nbsp; 
            <span style="color:#13365f" class="navbar-brand-full"><h4><b>myweb</b></h4></span>
            <span class="navbar-brand-minimized">Myweb</span>
        </a>
      
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <ul class="nav navbar-nav ml-auto">
        <div class="bs-example">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$useridvalue=auth()->user()->name; }}</a>
                <div class="dropdown-menu">
                    <a href="{{url('admin/users',auth()->user()->id)}}" class="dropdown-item">Profile</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            @if(count(config('panel.available_languages', [])) > 1)
                <li class="nav-item dropdown d-md-down-none">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            @endif


        </ul>
    </header>

    <div class="app-body">
        @include('partials.menu')
        <main class="main">


            <div style="padding-top: 20px;color:#343a40" class="container-fluid">
                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')

            </div>


        </main>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
     <script type="text/javascript" src="{{asset('/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{asset('/js/popper.min.js') }}"></script>
      <script type="text/javascript" src="{{asset('/js/coreui.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/dataTables.buttons.min.js
') }}"></script>
    <script type="text/javascript" src="{{asset('/js/buttons.flash.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/buttons.print.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/dataTables.select.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(function() {
  let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
  let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
  let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
  let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
  let printButtonTrans = '{{ trans('global.datatables.print') }}'
  let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

  let languages = {
    'en': '{{asset('/json/English.json') }}'
  };

  $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      url: languages['{{ app()->getLocale() }}']
    },
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: -1
    }],
    select: {
      style:    'multi+shift',
      selector: 'td:first-child'
    },
    order: [],
    scrollX: true,
    pageLength: 100,
    dom: 'lBfrtip<"actions">',
    buttons: [
      // {
      //   extend: 'copy',
      //   className: 'btn-default',
      //   text: copyButtonTrans,
      //   exportOptions: {
      //     columns: ':visible'
      //   }
      // },
      // {
      //   extend: 'csv',
      //   className: 'btn-default',
      //   text: csvButtonTrans,
      //   exportOptions: {
      //     columns: ':visible'
      //   }
      // },
      {
        extend: 'excel',
        className: 'btn-default',
        text: excelButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
    //   {
    //     extend: 'pdf',
    //     className: 'btn-default',
    //     title: ' JIMMA UNIVERSITY \n Jimma University | Digital Certificate Details (JU-CVMS)',
    //     filename: 'digital_certification_report',
    //     text: pdfButtonTrans,
    //     exportOptions: {
    //       columns: ':visible'
    //     },
        
    // pageSize: "LEGAL"
        
    //   },
      {
        extend: 'print',
        title: '',
        customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '14px');
                        $(win.document.body).append('<hr> <center><u><h4><b>Report Details </b></h4></u></center><center><br> <center><b>APPROVED by</b> Name: __________________________ROLE ___________________________               \t \t Signature: ______________________Date_____/___/___</center><br><br><center><b> <u>CC</u></b></center');
                        $(win.document.body).prepend('<br><br><center> <b><h2> Jimma University </h2></b></center><center> <h3> Tropical and Infectious Dieases Research Ceneter </h3></center><hr>');
                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css({ 
                                    size: '12px',
                                    margin:'25px 20px 20px 20px',
                                    color:'black'}) ;
                    },
        className: 'btn-default',
        text: printButtonTrans,
        exportOptions: {
          columns: [':visible',
        
          ]
        }
        
      },
      {
        extend: 'colvis',
        className: 'btn btn-outline-info',
        text: colvisButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      }
    ]
  });

  $.fn.dataTable.ext.classes.sPageButton = '';
});

    </script>
    @yield('scripts')
</body>

</html>
