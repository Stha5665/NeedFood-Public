<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NeedFood - @yield('title')</title>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- custom css link -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
</head>
<body>

    @include('frontend.include.navigation')
    @include('frontend.message.message')
    @yield('content')


    <!-- bootstrap javascript link -->
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <!-- custom js link -->
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script>

    @yield('script')
</body>
</html>
