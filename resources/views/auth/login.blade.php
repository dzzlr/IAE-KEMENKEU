@extends('layouts.logreg')

@section('content')
    <div class="container my-auto">
        <div class="row vh-80 my-3 bg-kmk rounded-3 shadow">
            <div class="col-md-6 px-0">
                <img class="auth-img rounded-3 img-fluid" src="img/left.png" alt="">
            </div>
            <div class="col-md-6 my-auto px-3">
                <div class="my-3">
                    <h3 class="text-light text-center h3-kmk">Masuk</h3>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3 px-3">
                        <div class="col">
                            <label for="email"
                                class="text-md-start text-sm-center text-light">{{ __('Alamat Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 px-3">
                        <div class="col">
                            <label for="password"
                                class="text-md-start text-sm-center text-light">{{ __('Kata Sandi') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 px-3">
                        <div class="col justify-content-start">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-light" for="remember">
                                    {{ __('Ingat saya') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 px-3">
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-light text-kmk">
                                {{ __('Masuk') }}
                            </button>
                        </div>
                        <div class="col-md-6 d-grid">
                            <a class="btn btn-light text-kmk" href="/redirect"><i class="fa-brands fa-google"></i>
                                {{ __('Masuk dengan Google') }}
                            </a>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-light" href="{{ route('password.request') }}">
                                {{ __('Lupa Kata Sandi Anda?') }}
                            </a>
                        @endif
                    </div>
                    <div class="row mb-3 px-3">
                        <div class="col text-center">
                            <p class="text-light">Belum punya Akun? 
                                <a class="text-light fw-bold text-decoration-none" href="{{ route('register') }}">{{ __('Daftar disini') }}
                                </a></p>
                            <a class="text-light text-decoration-none" href="{{ route('landing') }}">
                                {{ __('<    kembali ke halaman utama') }}
                            </a>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
    </div>
@endsection
