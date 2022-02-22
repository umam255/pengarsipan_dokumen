<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/login.css') }}" rel="stylesheet">
    <title>My Dokumen</title>
</head>

<body>
    <section class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <div class="form-container">
                    <img src="style/logo2.jpg" alt="logo">
                    <form class="form-group" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="Email" class="mb-1">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Enter Email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Password">Password</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="button mt-3 row col-sm-3">
                            <button type="submit" class="btn btn-sm">
                                {{ __('Login') }}
                            </button>
                        </div>


                    </form>
                </div>

            </section>
        </section>
    </section>
</body>

</html>
