<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sipasauki - Disperkimtan Jeneponto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/author/jpt_logo.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style>
        .login-bg {
            background: url(../images/author/jpt_logo.png) no-repeat center center fixed;
            position: relative;
            z-index: 1;
            /* width: 100% */
        }

        .login-bg:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            z-index: -1;
            height: 100%;
            width: 100%;
            background: #272727;
            opacity: 0.7;
        }

        /* register 4 page */

        .login-box-s2 {
            min-height: 100vh;
            background: #f9f9f9;
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .login-box-s2 form {
            margin: auto;
            background: #fff;
            width: 100%;
            max-width: 500px;
        }

        .login-form-head {
            text-align: center;
            background: #bfad28;
            padding: 50px;
        }

        .form-gp.focused label {
            top: -15px;
            color: #bfad28;
        }

        .form-gp i {
            position: absolute;
            right: 5px;
            bottom: 15px;
            color: #bfad28;
            font-size: 16px;
        }

        .submit-btn-area button:hover {
            background: #bfad28;
            color: #ffffff;
        }

        .login-form-head h6 {
            letter-spacing: 0;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 7px;
            color: #fff;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('login') }}" novalidate="novalidate">

                    @csrf

                    <div class="login-form-head">
                        <div class="row">
                            <div class="col align-self-center">
                                <img src="{{ asset('images/author/pu_logo.png') }}" alt="" width="20%">
                                <img src="{{ asset('images/author/jpt_logo.png') }}" alt="" width="20%">
                            </div>
                        </div>

                        <h4 class="mt-3 mb-0 pb-0">Sipasauki</h4>
                        <p class="pb-1 mb-1">Sistem informasi Prasarana, Sarana dan Utilitas Umum</p>
                        <h6>Dinas Perumahan dan Permukiman <br> Kab. Jeneponto</h6>

                        {{-- Sistem Informasi Prasarana, Sarana dan Utilisan Umum
                            Dinas Perumahan dan Pemukiman Kab. Jeneponto --}}

                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="username">Username</label>
                            <input class="is-invalid" type="text" id="username" name="username" autocomplete="off"
                                autofocus>
                            <i class="ti-user"></i>
                            <div class="text-danger">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" autocomplete="off">
                            <i class="ti-lock"></i>
                            <div class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Login <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>

    <!-- others plugins -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>

    {{-- Login Failed --}}
    @if (Session::has('error'))
        <script>
            $(document).ready(function() {
                let message_ = '{{ session('error') }}';
                Swal.fire(
                    "Maaf anda gagal login",
                    message_,
                    'error'
                );
            });
        </script>
    @endif
</body>

</html>
