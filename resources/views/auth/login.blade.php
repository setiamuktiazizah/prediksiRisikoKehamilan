<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Icon -->
    <link rel="icon" href="{{asset('images/logo.jpeg')}}">
    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            /* Ganti warna latar belakang sesuai kebutuhan Anda */
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: #ffffff;
            /* Warna latar belakang form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Efek bayangan form */
        }

        img {
            max-width: auto;
            height: auto;
        }

        .login-heading {
            margin-bottom: 20px;
        }

        .forgot-password-link {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 form-container">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <img src="{{asset('images/logo.jpeg')}}" alt="logo-mommymate" style="width: 35px; height: fit-content; margin-right: 10px;">
                    <h4>Mommy<span style="color: #F6C90E">Mate</span></h4>
                </div>
                <h4 class="text-center">Log In</h4>
                <br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <div class="col-md-8 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row text-center">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link forgot-password-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                    <div class="mb-0 row text-center">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
                <p class="mt-3 text-center">Don't have an account? <a href="{{route('register')}}" style="text-decoration: none">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>

</html>