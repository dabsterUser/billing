<!doctype html>
<html lang="{{ config('app.locale') }}"  data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    @include('partials.customer.head')
</head>

<body>
    <div id="layout-wrapper">
        <header id="page-topbar">
            @include('partials.customer.header')
        </header>
        @include('partials.customer.toastr')

            @include('partials.customer.sidebar')
            <div class="main-content">
                @yield('content')
                <footer class="footer">
                @include('partials.customer.footer')
                </footer>
            </div>
    </div>
       
        @include('partials.customer.layouts')

        
</body>

</html>
