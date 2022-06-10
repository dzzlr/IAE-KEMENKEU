@extends('layouts.admin')

@section('title', 'Dashboard')

@section('title-page', 'Sanksi')

@section('content')
<div class="mb-3">
    <button type="button" class="btn btn-sm btn-tambah text-light" style="background-color: #0869A6" data-toggle="modal" data-target="#tambahsanksi">
        Tambah Sanksi
    </button>
    <div class="modal fade" id="tambahsanksi">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Sanksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store.sanksi') }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        <div class="form-group mb-1">
                            <label for="nomor_sanksi">Nomor Sanksi</label>
                            <input type="text"
                                class="form-control form-control-sm @error('nomor_sanksi') is-invalid @enderror"
                                name="nomor_sanksi" id="nomor_sanksi"
                                value="{{ old('nomor_sanksi') }}">
                            @error('nomor_sanksi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="nama_sanksi">Nama sanksi</label>
                            <input type="text"
                                class="form-control form-control-sm @error('nama_sanksi') is-invalid @enderror"
                                name="nama_sanksi" id="nama_sanksi"
                                value="{{ old('nama_sanksi') }}">
                            @error('nama_sanksi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="isi_sanksi">Isi Sanksi</label>
                            <input type="text"
                                class="form-control form-control-sm @error('isi_sanksi') is-invalid @enderror"
                                name="isi_sanksi" id="isi_sanksi"
                                value="{{ old('isi_sanksi') }}">
                            @error('isi_sanksi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="tempat_ditetapkan">Tempat ditetapkan</label>
                            <input type="text"
                                class="form-control form-control-sm @error('tempat_ditetapkan') is-invalid @enderror"
                                name="tempat_ditetapkan" id="tempat_ditetapkan"
                                value="{{ old('tempat_ditetapkan') }}">
                            @error('tempat_ditetapkan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="tanggal_ditetapkan">Tanggal ditetapkan</label>
                            <input type="date"
                                class="form-control form-control-sm @error('tanggal_ditetapkan') is-invalid @enderror"
                                name="tanggal_ditetapkan" id="tanggal_ditetapkan"
                                value="{{ old('tanggal_ditetapkan') }}">
                            @error('tanggal_ditetapkan')
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
                            <label for="tentang">Tentang</label>
                            <input type="text"
                                class="form-control form-control-sm @error('tentang') is-invalid @enderror"
                                name="tentang" id="tentang"
                                value="{{ old('tentang') }}">
                            @error('tentang')
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
                        <form action="{{ route('admin.cari.sanksi') }}" method="get">
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
                            <h4>Total sanksi: {{ $total }}</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-head-fixed ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sanksi</th>
                            <th>Nomor Sanksi</th>
                            <th>Tanggal</th>
                            <th>Tentang</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $datas)
                            <tr>
                                <td>{{ $data-> firstItem()+ $key }}</td>
                                <td>{{ $datas->nama_sanksi }}</td>
                                <td>{{ $datas->nomor_sanksi }}</td>
                                <td>{{ $datas->tanggal_ditetapkan }}</td>
                                <td>{{ $datas->tentang }}</td>
                                <td>
                                    @if($datas->status == "Diterbitkan")
                                        <span class="badge bg-success">{{ $datas->status }}</span>                                    
                                    @elseif($datas->status == "Diproses")              
                                        <span class="badge bg-light text-dark">{{ $datas->status }}</span>                                    
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#showDetailSanksi{{ $datas->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="modal fade" id="showDetailSanksi{{ $datas->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail sanksi</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($datas->status == 'Diproses')
                                                    <form
                                                        action="{{ url('/admin/sanksi/update/'. $datas->id .'') }}"
                                                        enctype="multipart/form-data" method="post">
                                                        @csrf
                                                        <div class="form-group mb-1">
                                                            <label for="nama_sanksi">Nama Sanksi</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('nama_sanksi') is-invalid @enderror"
                                                                name="nama_sanksi" id="nama_sanksi"
                                                                value="{{ $datas->nama_sanksi }}">
                                                            @error('nama_sanksi')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="nomor_sanksi">Nomor Sanksi</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('nomor_sanksi') is-invalid @enderror"
                                                                name="nomor_sanksi" id="nomor_sanksi"
                                                                value="{{ $datas->nomor_sanksi }}">
                                                            @error('nomor_sanksi')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="isi_sanksi">Isi Sanksi</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('isi_sanksi') is-invalid @enderror"
                                                                name="isi_sanksi" id="isi_sanksi"
                                                                value="{{ $datas->isi_sanksi }}">
                                                            @error('isi_sanksi')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="tempat_ditetapkan">Tempat di Tetapkan</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('tempat_ditetapkan') is-invalid @enderror"
                                                                name="tempat_ditetapkan" id="tempat_ditetapkan"
                                                                value="{{ $datas->tempat_ditetapkan }}">
                                                            @error('tempat_ditetapkan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="tanggal_ditetapkan">Tanggal di Tetapkan</label>
                                                            <input type="date"
                                                                class="form-control form-control-sm @error('tanggal_ditetapkan') is-invalid @enderror"
                                                                name="tanggal_ditetapkan" id="tanggal_ditetapkan"
                                                                value="{{ $datas->tanggal_ditetapkan }}">
                                                            @error('tanggal_ditetapkan')
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
                                                            <label for="tentang">Tentang</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('tentang') is-invalid @enderror"
                                                                name="tentang" id="tentang"
                                                                value="{{ $datas->tentang }}">
                                                            @error('tentang')
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
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-sm bg-danger" data-dismiss="modal">Tutup</button>
                                                    <button class="btn btn-sm btn-primary" type="submit"
                                                    @if ($datas->status == 'Diterbitkan')
                                                        {{ 'disabled' }}
                                                    @endif>Simpan</button>
                                                </div>
                                                    @elseif($datas->status == 'Diterbitkan')
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group mb-1">
                                                                <label for="nama_sanksi">Nama Sanksi</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm @error('nama_sanksi') is-invalid @enderror"
                                                                    name="nama_sanksi" id="nama_sanksi"
                                                                    value="{{ $datas->nama_sanksi }}" readonly>
                                                                @error('nama_sanksi')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-1">
                                                                <label for="nomor_sanksi">Nomor Sanksi</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm @error('nomor_sanksi') is-invalid @enderror"
                                                                    name="nomor_sanksi" id="nomor_sanksi"
                                                                    value="{{ $datas->nomor_sanksi }}" readonly>
                                                                @error('nomor_sanksi')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group mb-1">
                                                                <label for="isi_sanksi">Isi Sanksi</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm @error('isi_sanksi') is-invalid @enderror"
                                                                    name="isi_sanksi" id="isi_sanksi"
                                                                    value="{{ $datas->isi_sanksi }}" readonly>
                                                                @error('isi_sanksi')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-1">
                                                                <label for="tentang">Tentang</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm @error('tentang') is-invalid @enderror"
                                                                    name="tentang" id="tentang"
                                                                    value="{{ $datas->tentang }}" readonly>
                                                                @error('tentang')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="form-group mb-1">
                                                                    <label for="tempat_ditetapkan">Tempat Ditetapkan</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm @error('tempat_ditetapkan') is-invalid @enderror"
                                                                        name="tempat_ditetapkan" id="tempat_ditetapkan"
                                                                        value="{{ $datas->tempat_ditetapkan }}" readonly>
                                                                    @error('tempat_ditetapkan')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group mb-1">
                                                                    <label for="tanggal_ditetapkan">Tanggal Ditetapkan</label>
                                                                    <input type="date"
                                                                        class="form-control form-control-sm @error('tanggal_ditetapkan') is-invalid @enderror"
                                                                        name="tanggal_ditetapkan" id="tanggal_ditetapkan"
                                                                        value="{{ $datas->tanggal_ditetapkan }}" readonly>
                                                                    @error('tanggal_ditetapkan')
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
                                                                <img class="kebijakan ttd-border img-fluid" src="{{ asset('img/sanksi/ttd/'. $datas->tanda_tangan .'') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-sm bg-danger" data-dismiss="modal">Tutup</button>
                                                        <button class="btn btn-sm btn-primary" type="submit"
                                                        @if ($datas->status == 'Diterbitkan')
                                                            {{ 'disabled' }}
                                                        @endif>Simpan</button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($datas->status =='Diproses')
                                        <a href="{{ url ('admin/sanksi/status/'. $datas->id) }}"
                                            class="btn btn-warning btn-sm text-white">Terbitkan</a>
                                    @endif
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ url('/admin/sanksi/delete/'.$datas->id) }}">Hapus</a>
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
