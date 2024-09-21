<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page1">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ameen - Bootstrap Admin Dashboard HTML Template</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_assets/images/favicon.png') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('admin_assets/js/modernizr-3.6.0.min.js') }}"></script>
</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="index.html">
                                        <img src="{{ asset('admin_assets/images/f-logo.png') }}" alt="">
                                    </a>
                                </div>
                                <h4 class="text-center m-t-15">Log into Your Account</h4>
                                <form class="m-t-30 m-b-30" method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" required class="form-control" autocomplete="username" placeholder="Email">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                                        @error('password')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-check p-l-0">
                                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                                <label class="form-check-label" for="basic_checkbox_1">Check me
                                                    out</label>
                                            </div>
                                        </div>

                                        @if (Route::has('password.request'))
                                        <div class="form-group col-md-6 text-right"><a href=" href="{{ route('password.request') }}"">Forgot
                                            Password?</a>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="text-center m-b-15 m-t-15">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="{{ asset('admin_assets/plugins/common/common.min.js') }}"></script>
    <!-- Custom script -->
    <script src="{{ asset('admin_assets/js/custom.min.js') }}"></script>
</body>

</html>
