<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Portal IT' }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{asset('images/logobtx.png')}}" />
    <link rel="stylesheet" href="{{ asset('/assets/vendors/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fitur.css') }}">

    @stack('css')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('nav.navbar')
        </div>
        <div id="main">
            
            
            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ date('Y') }} &copy; {{ env('APP_NAME') }} - Behaestex Group</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted by <a href="">IT BTX</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/extensions/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script src="{{ asset('/js/modals/AksesInternet/modal-add.js')}}"></script>
    <script src="{{ asset('/js/modals/AksesInternet/modal-edit.js')}}"></script>
    <script src="{{ asset('/js/modals/AksesInternet/delete-aksesinternet.js')}}"></script>
    <script src="{{ asset('/js/modals/RevisiData/modal-add.js') }}"></script>
    <script src="{{ asset('/js/modals/RevisiData/modal-edit.js') }}"></script>
    <script src="{{ asset('/js/modals/RevisiData/modal-view.js') }}"></script>
    <script src="{{asset('js/modals/RevisiData/delete-revisidata.js')}}"></script>
    <script src="{{ asset('/assets/js/datetime.js') }}"></script>

    <script src="{{asset('js/tabel.js')}}"></script>
    <script src="{{asset('js/modals/AksesProgram/modal-add.js')}}"></script>
    <script src="{{ asset('/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>   

    @stack('js')


</body>

</html>
