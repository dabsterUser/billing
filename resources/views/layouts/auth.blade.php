<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('partials.auth.header')
</head>

<body>
    
  
    @yield('content')

    @include('partials.auth.footer')

</body>

</html>