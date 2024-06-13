@extends('layouts.app_auth')

@section('content')
    <style>
        .login-box-mdf {
            min-height: 100%;
            /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh;
            /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }

        .input-group-addon {
            border: 1px solid #ced4da;
            height: calc(2.25rem + 2px);
            background-color: #E7E9EB;
            border-left: none;
            border-top-right-radius: .25rem;
            border-bottom-right-radius: .25rem;
        }
    </style>

    <div class="login-box-mdf">
        <!-- /.login-logo -->
        <div class="card card-outline card-danger" style="width: 38rem;">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>INVENTORY </b>CABIND</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> --}}
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="email">

                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <div class="input-group" id="show_hide_password">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" placeholder="Password">
                                <div class="input-group-addon p-2">
                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"
                                            style="color: #495057"></i></a>
                                </div>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- <div class="col-md-6 offset-md-4">
                            <label>Belum Punya Akun? </label>
                            <a href="{{ route('register') }}">Register</a>
                        </div> --}}
                        {{-- <div class="col-md-6 offset-md-4">
                            <label>Ganti Password? </label>
                            <a href="{{ route('change-password') }}">Klik disini</a>
                        </div> --}}
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-block btn-primary clickanime">
                                {{ __('Login') }}
                            </button>

                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection

@section('footer')
@endsection
