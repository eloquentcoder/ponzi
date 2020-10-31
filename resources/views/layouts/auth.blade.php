<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mannat Themes">
        <meta name="keyword" content="">

        <title> Green Rich Wide Investment - @yield('title')</title>

        <!-- Theme icon -->
        <link rel="shortcut icon" href="{{ asset('home/logo.jpeg') }}">

        <!-- Theme Css -->
        <link href="{{ asset('dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('dashboard/css/slidebars.min.css')}}" rel="stylesheet">
        <link href="{{ asset('dashboard/css/icons.css')}}" rel="stylesheet">
        <link href="{{ asset('dashboard/css/menu.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dashboard/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('dashboard/plugins/sweetalert2/dist/sweetalert2.css') }}">
    </head>

    <body class="sticky-header">
        <section class="bg-login" style="background: url({{ asset('home/banner.jpg') }}) no-repeat; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="wrapper-page">
                            <div class="account-pages">
                               @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery -->
        <script src="{{ asset('dashboard/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/popper.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/jquery-migrate.js')}}"></script>
        <script src="{{ asset('dashboard/js/modernizr.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/slidebars.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
        <!--app js-->
        <script src="{{ asset('dashboard/js/jquery.app.js')}}"></script>
        <script>
            //   @if(Session::has('success'))
            //         Swal.fire(
            //             'Success!',
            //             '{{Session::get('success')}}',
            //             'success'
            //         )
            //     @endif

            //     @if(Session::has('error'))
            //         Swal.fire(
            //             'Error!',
            //             '{{Session::get('error')}}',
            //             'warning'
            //         )
            //     @endif
        </script>
    </body>
</html>
