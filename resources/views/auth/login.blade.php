<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Riho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('login_assets/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('login_assets/assets/images/favicon.png') }}" type="image/x-icon">
    <title>{{$pageTitle}} - Raker UINSU</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('login_assets/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/assets/css/responsive.css') }}">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5"><img class="bg-img-cover bg-center"
                    src="{{ asset('own_assets/images/banner.jpeg') }}" alt="looginpage"></div>
            <div class="col-xl-7 p-0">
                <div class="login-card login-dark">
                    <div>
                        {{-- <div><a class="logo text-start" href="index.html"><img class="img-fluid for-dark"
                                    src="{{ asset('login_assets/assets/images/logo/logo.png') }}"
                                    alt="looginpage"><img class="img-fluid for-light"
                                    src="{{ asset('login_assets/assets/images/logo/logo_dark.png') }}"
                                    alt="looginpage" width="150px"></a></div> --}}
                        <div class="login-main">
                            <form class="theme-form" action="/login" method="post">
                                {{ csrf_field() }}
                                @if (session()->get('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <b>Username</b> atau <b>password</b> yang anda masukkan salah
                                    </div>
                                @endif
                                <h4>Login</h4>
                                <p>Silahkan masukkan Username dan Password anda</p>
                                <div class="form-group">
                                    <label class="col-form-label">Username</label>
                                    <input class="form-control" type="text" required="" placeholder="Username"
                                        name="username">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" required=""
                                            placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                </div>
                                {{-- <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                                <div class="social mt-4">
                                    <div class="btn-showcase"><a class="btn btn-light"
                                            href="https://www.linkedin.com/login" target="_blank"><i
                                                class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a
                                            class="btn btn-light" href="https://twitter.com/login?lang=en"
                                            target="_blank"><i class="txt-twitter"
                                                data-feather="twitter"></i>twitter</a><a class="btn btn-light"
                                            href="https://www.facebook.com/" target="_blank"><i class="txt-fb"
                                                data-feather="facebook"></i>facebook</a></div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="{{ asset('login_assets/assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ asset('login_assets/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <!-- feather icon js-->
        <script src="{{ asset('login_assets/assets/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('login_assets/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="{{ asset('login_assets/assets/js/config.js') }}"></script>
        <!-- Plugins JS start-->
        <!-- calendar js-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="{{ asset('login_assets/assets/js/script.js') }}"></script>
    </div>
</body>

</html>
