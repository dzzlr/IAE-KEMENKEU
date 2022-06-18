@extends('layouts.user')

@section('title', 'Dashboard')

@section('title-page', 'Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 mb-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Account Details
            </div>
            <div class="card-body table-responsive">
                <div class="row g-4">
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="no_hp" class="col-sm-4 col-form-label">No. Handphone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ auth()->user()->no_hp }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->role == 'profkeu')
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header">
                Account Information
            </div>
            @foreach($data_profile as $key => $datas)
            <div class="card-body table-responsive">
                <form action="{{ url('/profile/update/'. $datas->id .'') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ $datas->id_user }}">
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $datas->nama }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $datas->tanggal_lahir }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $datas->tempat_lahir }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $datas->alamat }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="agama" name="agama" value="{{ $datas->agama }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="umur" class="col-sm-3 col-form-label">Umur</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="umur" name="umur" min="0" value="{{ $datas->umur }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3 row">
                                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $datas->nik }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="npw" class="col-sm-3 col-form-label">NPWP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="npw" name="npw" value="{{ $datas->npw }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="pangkat" class="col-sm-3 col-form-label">Pangkat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pangkat" name="pangkat" value="{{ $datas->pangkat }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gelar" class="col-sm-3 col-form-label">Gelar</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="gelar" name="gelar" value="{{ $datas->gelar }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $datas->jabatan }}">
                                </div>
                            </div>
                            <div class="mb-3 row justify-content-center">
                                <button type="submit" class="btn btn-primary" style="width: 10rem">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
