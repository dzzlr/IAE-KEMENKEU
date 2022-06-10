@extends('layouts.admin')

@section('title', 'Dashboard')

@section('title-page', 'Kebijakan')

@section('content')
<div class="mb-3">
    <button type="button" class="btn btn-sm btn-tambah text-light" style="background-color: #0869A6" data-toggle="modal" data-target="#tambahKebijakan">
        Tambah Kebijakan
    </button>
    <div class="modal fade" id="tambahKebijakan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kebijakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store.kebijakan') }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        <div class="form-group mb-1">
                            <label for="nama_peraturan">Nama Peraturan</label>
                            <input type="text"
                                class="form-control form-control-sm @error('nama_peraturan') is-invalid @enderror"
                                name="nama_peraturan" id="nama_peraturan"
                                value="{{ old('nama_peraturan') }}">
                            @error('nama_peraturan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="nomor_peraturan">Nomor Peraturan</label>
                            <input type="text"
                                class="form-control form-control-sm @error('nomor_peraturan') is-invalid @enderror"
                                name="nomor_peraturan" id="nomor_peraturan"
                                value="{{ old('nomor_peraturan') }}">
                            @error('nomor_peraturan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="isi_peraturan">Isi Peraturan</label>
                            <input type="text"
                                class="form-control form-control-sm @error('isi_peraturan') is-invalid @enderror"
                                name="isi_peraturan" id="isi_peraturan"
                                value="{{ old('isi_peraturan') }}">
                            @error('isi_peraturan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="tempat_di_tetapkan">Tempat di Tetapkan</label>
                            <input type="text"
                                class="form-control form-control-sm @error('tempat_di_tetapkan') is-invalid @enderror"
                                name="tempat_di_tetapkan" id="tempat_di_tetapkan"
                                value="{{ old('tempat_di_tetapkan') }}">
                            @error('tempat_di_tetapkan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="tanggal_di_tetapkan">Tanggal di Tetapkan</label>
                            <input type="date"
                                class="form-control form-control-sm @error('tanggal_di_tetapkan') is-invalid @enderror"
                                name="tanggal_di_tetapkan" id="tanggal_di_tetapkan"
                                value="{{ old('tanggal_di_tetapkan') }}">
                            @error('tanggal_di_tetapkan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="nama_penandatangan">Nama Penandatangan</label>
                            <input type="text"
                                class="form-control form-control-sm @error('nama_penandatangan') is-invalid @enderror"
                                name="nama_penandatangan" id="nama_penandatangan"
                                value="{{ old('nama_penandatangan') }}">
                            @error('nama_penandatangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="tanda_tangan" class="form-label">Tanda Tangan</label>
                            <input class="form-control @error('tanda_tangan') is-invalid @enderror" id="tanda_tangan"
                                type="file" name="tanda_tangan">
                            @error('tanda_tangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-sm bg-danger" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-sm bg-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('admin.cari.kebijakan') }}" method="get">
                            <div class="input-group input-group-sm" style="width: 500px;">
                                <input type="text" name="cari" class="form-control float-right" placeholder="Cari">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col ">
                        <?php
                            $total = 0;
                            foreach($data as $key => $datas){
                                if ($datas->status == "Diterbitkan"){
                                    $total += 1;
                                }
                            }
                            
                        ?>
                        <div style="margin-left:200px;">
                            <h4>Total Kebijakan: {{ $total }}</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-head-fixed ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kebijakan</th>
                            <th>Penanda Tangan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $datas)
                            <tr>
                                <td>{{ $data-> firstItem()+ $key }}</td>
                                <td>{{ $datas->nama_peraturan }}</td>
                                <td>{{ $datas->nama_penandatangan }}</td>
                                <td>{{ $datas->tanggal_di_tetapkan }}</td>
                                <td>
                                    @if($datas->status == "Diterbitkan")
                                        <span class="badge bg-success">{{ $datas->status }}</span>                                    
                                    @elseif($datas->status == "Diproses")              
                                        <span class="badge bg-light text-dark">{{ $datas->status }}</span>                                    
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#showDetailKebijakan_{{ $datas->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="modal fade" id="showDetailKebijakan_{{ $datas->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Kebijakan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($datas->status != "Diterbitkan")
                                                    <form
                                                        action="{{ url('/admin/kebijakan/update/'. $datas->id .'') }}"
                                                        enctype="multipart/form-data" method="post">
                                                        @csrf
                                                        <div class="form-group mb-1">
                                                            <label for="nama_peraturan">Nama Peraturan</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('nama_peraturan') is-invalid @enderror"
                                                                name="nama_peraturan" id="nama_peraturan"
                                                                value="{{ $datas->nama_peraturan }}">
                                                            @error('nama_peraturan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="nomor_peraturan">Nomor Peraturan</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('nomor_peraturan') is-invalid @enderror"
                                                                name="nomor_peraturan" id="nomor_peraturan"
                                                                value="{{ $datas->nomor_peraturan }}">
                                                            @error('nomor_peraturan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="isi_peraturan">Isi Peraturan</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('isi_peraturan') is-invalid @enderror"
                                                                name="isi_peraturan" id="isi_peraturan"
                                                                value="{{ $datas->isi_peraturan }}">
                                                            @error('isi_peraturan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="tempat_di_tetapkan">Tempat di Tetapkan</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('tempat_di_tetapkan') is-invalid @enderror"
                                                                name="tempat_di_tetapkan" id="tempat_di_tetapkan"
                                                                value="{{ $datas->tempat_di_tetapkan }}">
                                                            @error('tempat_di_tetapkan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="tanggal_di_tetapkan">Tanggal di Tetapkan</label>
                                                            <input type="date"
                                                                class="form-control form-control-sm @error('tanggal_di_tetapkan') is-invalid @enderror"
                                                                name="tanggal_di_tetapkan" id="tanggal_di_tetapkan"
                                                                value="{{ $datas->tanggal_di_tetapkan }}">
                                                            @error('tanggal_di_tetapkan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="nama_penandatangan">Nama Penandatangan</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('nama_penandatangan') is-invalid @enderror"
                                                                name="nama_penandatangan" id="nama_penandatangan"
                                                                value="{{ $datas->nama_penandatangan }}">
                                                            @error('nama_penandatangan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="tanda_tangan" class="form-label">Tanda
                                                                Tangan</label>
                                                            <input
                                                                class="form-control @error('tanda_tangan') is-invalid @enderror"
                                                                id="tanda_tangan" type="file" name="tanda_tangan">
                                                            @error('tanda_tangan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        @elseif($datas->status == 'Diterbitkan')
                                                        <div class="form-group mb-1">
                                                            <label for="nama_peraturan">Nama Peraturan</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('nama_peraturan') is-invalid @enderror"
                                                                name="nama_peraturan" id="nama_peraturan"
                                                                value="{{ $datas->nama_peraturan }}" readonly>
                                                            @error('nama_peraturan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="nomor_peraturan">Nomor Peraturan</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('nomor_peraturan') is-invalid @enderror"
                                                                name="nomor_peraturan" id="nomor_peraturan"
                                                                value="{{ $datas->nomor_peraturan }}" readonly>
                                                            @error('nomor_peraturan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="isi_peraturan">Isi Peraturan</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('isi_peraturan') is-invalid @enderror"
                                                                name="isi_peraturan" id="isi_peraturan"
                                                                value="{{ $datas->isi_peraturan }}" readonly>
                                                            @error('isi_peraturan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="form-group mb-1">
                                                                        <label for="tempat_di_tetapkan">Tempat di Tetapkan</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-sm @error('tempat_di_tetapkan') is-invalid @enderror"
                                                                            name="tempat_di_tetapkan" id="tempat_di_tetapkan"
                                                                            value="{{ $datas->tempat_di_tetapkan }}" readonly>
                                                                        @error('tempat_di_tetapkan')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group mb-1">
                                                                        <label for="tanggal_di_tetapkan">Tanggal di Tetapkan</label>
                                                                        <input type="date"
                                                                            class="form-control form-control-sm @error('tanggal_di_tetapkan') is-invalid @enderror"
                                                                            name="tanggal_di_tetapkan" id="tanggal_di_tetapkan"
                                                                            value="{{ $datas->tanggal_di_tetapkan }}" readonly>
                                                                        @error('tanggal_di_tetapkan')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group mb-1">
                                                                        <label for="nama_penandatangan">Nama Penandatangan</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-sm @error('nama_penandatangan') is-invalid @enderror"
                                                                            name="nama_penandatangan" id="nama_penandatangan"
                                                                            value="{{ $datas->nama_penandatangan }}" readonly>
                                                                        @error('nama_penandatangan')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group mb-2">
                                                                    <label for="tanda_tangan">Tanda Tangan</label>
                                                                    <img class="kebijakan ttd-border img-fluid" src="{{ asset('img/kebijakan/ttd/'. $datas->tanda_tangan .'') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-sm bg-danger" data-dismiss="modal">Tutup</button>
                                                    <button class="btn btn-sm btn-primary" type="submit"
                                                    @if ($datas->status == 'Diterbitkan')
                                                        {{ 'disabled' }}
                                                    @endif>Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($datas->status =='Diproses')
                                        <a href="{{ url ('admin/kebijakan/status/'. $datas->id) }}"
                                            class="btn btn-warning btn-sm text-white">Terbitkan</a>
                                    @endif
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ url('/admin/kebijakan/delete/'.$datas->id) }}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-left">
                    Menampilkan
                    {{ $data->firstItem() }}
                    sampai
                    {{ $data->lastItem() }}
                    dari
                    {{ $data->total() }}
                    data
                </div>
                <div class="float-right">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
