<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/coreui/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    @stack('styles')
</head>

<body class="c-app">

    @include('admin.layouts.navigation')

    <div class="c-wrapper c-fixed-components">
        @include('admin.layouts.navbar')

        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>

            <footer class="c-footer">
                <div><a href="https://github.com/vantanto/vrestaurant">vrestaurant</a> &copy; 2023. All rights reserved.</div>
                <div class="ml-auto">Build by&nbsp;<a href="https://github.com/vantanto">vantanto</a></div>
            </footer>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" integrity="sha512-bj8HE1pKwchoYNizhD57Vl6B9ExS25Hw21WxoQEzGapNNjLZ0+kgRMEn9KSCD+igbE9+/dJO7x6ZhLrdaQ5P3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('scriptsvendor')
    
    <script src="{{ asset('assets/js/coreui/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/coreui/coreui-utils.js') }}"></script>
    
    @stack('scripts')
</body>

</html>