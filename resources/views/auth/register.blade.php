@extends('layouts.logreg')

@section('content')
    <div class="container my-auto">
        <div class="row vh-80 my-3 bg-kmk rounded-3 shadow">
            <div class="col-md-6 px-0">
                <img class="auth-img rounded-3 img-fluid" src="img/left.png" alt="">
            </div>
            <div class="col-md-6 my-auto px-3">
                <div class="my-3">
                    <h3 class="text-light text-center h3-kmk">Registrasi</h3>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3 px-3">
                        <div class="col">
                            <label for="name"
                                class="text-md-start text-sm-center text-light">{{ __('Nama Lengkap') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 px-3">
                        <div class="col">
                            <label for="email"
                                class="text-md-start text-sm-center text-light">{{ __('Alamat Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-1 px-3">
                        <div class="col">
                            <label for="no_hp"
                                class="text-md-start text-sm-center text-light">{{ __('Nomor Handphone') }}</label>
                            <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row px-3">
                        <div class="col">
                            <hr class="text-white">
                        </div>
                    </div>

                    <div class="row mb-3 px-3">
                        <div class="col">
                            <label for="password"
                                class="text-md-start text-sm-center text-light">{{ __('Kata Sandi') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 px-3">
                        <div class="col">
                            <label for="password-confirm"
                                class="text-md-start text-sm-center text-light">{{ __('Konfirmasi Kata Sandi') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3 px-3">
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-light text-kmk">
                                {{ __('Daftar Sekarang') }}
                            </button>
                        </div>
                        <div class="col-md-6 d-grid">
                            <a class="btn btn-light text-kmk" href="/redirect"><i class="fa-brands fa-google"></i>
                                {{ __('Daftar dengan Google') }}
                            </a>
                        </div>
                    </div>
                    <div class="row mb-3 px-3">
                        <div class="col text-center">
                            <p class="text-light">Sudah punya Akun?
                                <a class="text-light fw-bold text-decoration-none"
                                    href="{{ route('login') }}">{{ __('Masuk disini') }}
                                </a>
                            </p>
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