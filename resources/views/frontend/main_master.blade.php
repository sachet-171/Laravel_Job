<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Laravel Job Vacancy</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/fontAwesome.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/hero-slider.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
    <!-- toastr CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- toastr CSS -->

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <script src="{{url('frontend/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
</head>

<body>
    <!-- Start Navbar Area -->
    @include('frontend.body.navbar')
    <!-- End Navbar Area -->
    <main>
        @yield('main')
    </main>
    <!-- Start Navbar Area -->
    @include('frontend.body.footer')
    <!-- End Navbar Area -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="{{url('frontend/js/vendor/bootstrap.min.js')}}"></script>

    <script src="{{url('frontend/js/datepicker.js')}}"></script>
    <script src="{{url('frontend/js/plugins.js')}}"></script>
    <script src="{{url('frontend/js/main.js')}}"></script>

    <!-- toastr -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
    </script>
<!-- toastr -->
</body>

</html>