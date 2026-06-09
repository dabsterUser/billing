<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased" style="background-color:#eff3fd">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900 ">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-xxl-7">
                    <a href="/billing/login" class="svg-class text-nowrap logo-img d-block px-4 py-9 w-100">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                    <div class="d-none d-xl-flex align-items-center justify-content-center"
                        style="height: calc(100vh - 80px);">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg"
                            alt="" class="img-fluid" width="500">
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-5" style="background-color:#fff">
                    <div
                        class="authentication-login
                    min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <h2 class="mb-3 fs-7 fw-bolder">Welcome to Dabster</h2>
                            <p class=" mb-9">Your Admin Dashboard</p>

                            <div
                                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
