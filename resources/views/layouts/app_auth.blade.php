<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Cabind | Log in</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/sweetalert2/sweetalert2.min.css') }}">
    {{-- Bootstrap CSS --}}
    {{-- <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}

    <style>
        @font-face {
            font-family: 'Roboto';
            src: url({{ asset('font/Roboto_Condensed/RobotoCondensed-Regular.ttf') }});
            font-display: swap;
        }

        body {
            font-family: 'Roboto';
        }

        /* .loading {
            position: fixed;
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
            align-items: center;
            opacity: 0.7;
            background-color: black;
            z-index: 9999999;
            top: 0;
            left: 0;
        }

        .loading div {
            width: 1rem;
            height: 1rem;
            margin: 2rem 0.3rem;
            background: red;
            border-radius: 50%;
            animation: 0.4s bounce infinite alternate
        }

        .loading div:nth-child(2) {
            animation-delay: 0.3s;
        }

        .loading div:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {
            to {
                opacity: 0.3;
                transform: translate3d(0, -1rem, 0);
            }
        } */

        .login-page {
            background-color: #212529 !important;
        }

        /* ==================== */
        .lds-spinner {
            position: fixed;
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
            align-items: center;
            opacity: 0.7;
            background-color: black;
            z-index: 9999999;
            top: 0;
            left: 0;
            /* width: 80px;
            height: 80px; */
        }

        .lds-spinner div {
            transform-origin: 40px 40px;
            animation: lds-spinner 1.2s linear infinite;
        }

        .lds-spinner div:after {
            content: " ";
            display: block;
            position: absolute;
            top: 3px;
            left: 37px;
            width: 6px;
            height: 18px;
            border-radius: 20%;
            background: red;
        }

        .lds-spinner div:nth-child(1) {
            transform: rotate(0deg);
            animation-delay: -1.1s;
        }

        .lds-spinner div:nth-child(2) {
            transform: rotate(30deg);
            animation-delay: -1s;
        }

        .lds-spinner div:nth-child(3) {
            transform: rotate(60deg);
            animation-delay: -0.9s;
        }

        .lds-spinner div:nth-child(4) {
            transform: rotate(90deg);
            animation-delay: -0.8s;
        }

        .lds-spinner div:nth-child(5) {
            transform: rotate(120deg);
            animation-delay: -0.7s;
        }

        .lds-spinner div:nth-child(6) {
            transform: rotate(150deg);
            animation-delay: -0.6s;
        }

        .lds-spinner div:nth-child(7) {
            transform: rotate(180deg);
            animation-delay: -0.5s;
        }

        .lds-spinner div:nth-child(8) {
            transform: rotate(210deg);
            animation-delay: -0.4s;
        }

        .lds-spinner div:nth-child(9) {
            transform: rotate(240deg);
            animation-delay: -0.3s;
        }

        .lds-spinner div:nth-child(10) {
            transform: rotate(270deg);
            animation-delay: -0.2s;
        }

        .lds-spinner div:nth-child(11) {
            transform: rotate(300deg);
            animation-delay: -0.1s;
        }

        .lds-spinner div:nth-child(12) {
            transform: rotate(330deg);
            animation-delay: 0s;
        }

        @keyframes lds-spinner {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
</head>

<body class="hold-transition login-page text-sm">
    {{-- <div class="loading">
        <div></div>
        <div></div>
        <div></div>
    </div> --}}
    <div class="lds-spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    {{-- SweetAlert --}}
    <script src="{{ asset('admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(window).on('beforeunload', function() {
            // $('body .loading').css('display', 'flex')
            $('body .lds-spinner').css('display', 'flex')
            setTimeout(function() {
                $('body .lds-spinner').css('display', 'none')
            }, 5000);
            // $('.loading').hide()
            // $('.lds-spinner').hide()
        });
        $(window).on('load', function() {
            // $('.loading').hide()
            $('body .lds-spinner').css('display', 'none')
        })
    </script>
    @yield('footer')
</body>

</html>
