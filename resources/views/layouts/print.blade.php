<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
@include('partials.printtemplate.header')
</head>

<body>
   
        @yield('content')
            
    @include('partials.printtemplate.footer')
</body>

</html>