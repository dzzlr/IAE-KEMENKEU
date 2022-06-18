@extends('layouts.user')

@section('title', 'Dashboard')

@section('title-page', 'Surat Tugas')

@section('content')
@php
    use App\Models\User;
    $user = User::all();
@endphp
@if(Auth::user()->role == 'st')
<div class="mb-3">
    <button type="button" class="btn btn-sm btn-tambah text-light" style="background-color: #0869A6" data-toggle="modal" data-target="#tambahSuratTugas">
        Tambah Surat Tugas
    </button>
    <div class="modal fade" id="tambahSuratTugas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Surat Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('st.store') }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        <div class="form-group mb-1">
                            <label for="id_user">ID Pengguna</label>
                            <select name="id_user" class="form-select form-select-sm">
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ "".$item->id." - ". $item->name ."" }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-1">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text"
                                class="form-control form-control-sm @error('no_surat') is-invalid @enderror"
                                name="no_surat" id="no_surat"
                                value="{{ old('no_surat') }}">
                            @error('no_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="nomor_izin">Nomor Izin</label>
                            <input type="text"
                                class="form-control form-control-sm @error('nomor_izin') is-invalid @enderror"
                                name="nomor_izin" id="nomor_izin"
                                value="{{ old('nomor_izin') }}">
                            @error('nomor_izin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="lingkup_kegiatan">Lingkup Kegiatan</label>
                            <input type="text"
                                class="form-control form-control-sm @error('lingkup_kegiatan') is-invalid @enderror"
                                name="lingkup_kegiatan" id="lingkup_kegiatan"
                                value="{{ old('lingkup_kegiatan') }}">
                            @error('lingkup_kegiatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="alamat">Alamat</label>
                            <input type="text"
                                class="form-control form-control-sm @error('alamat') is-invalid @enderror"
                                name="alamat" id="alamat"
                                value="{{ old('alamat') }}">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                            <input type="date"
                                class="form-control form-control-sm @error('tanggal_kegiatan') is-invalid @enderror"
                                name="tanggal_kegiatan" id="tanggal_kegiatan"
                                value="{{ old('tanggal_kegiatan') }}">
                            @error('tanggal_kegiatan')
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
@endif
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
                        <form action="{{ route('st.cari') }}" method="get">
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
                                    $total += 1;
                                } 
                        ?>
                        <div style="margin-left:200px;">
                            <h4>Total Surat Tugas: {{ $total }}</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-head-fixed ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Lingkup Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Penanda Tangan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $datas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $datas->no_surat }}</td>
                                <td>{{ $datas->lingkup_kegiatan }}</td>
                                <td>{{ $datas->tanggal_kegiatan }}</td>
                                <td>{{ $datas->nama_penandatangan }}</td>
                                <td class="d-flex">
                                    @if($datas->status == "Diterima")
                                        <span class="badge bg-success my-2">{{ $datas->status }}</span>                                    
                                    @elseif($datas->status == "Diproses")
                                        @if(Auth::user()->role == 'st')
                                            <form action="{{ url('/surat-tugas/terima/'.$datas->id) }}" method="post">
                                                @csrf
                                                <input type="text" name="status" value="Diterima" hidden>
                                                <button type="submit" class="btn btn-sm btn-warning mb-1 mx-1">Terima</a> 
                                            </form>                      
                                            <form action="{{ url('/surat-tugas/tolak/'.$datas->id .'') }}" method="post">
                                                @csrf
                                                <input type="text" name="status" value="Ditolak" hidden>
                                                <button type="submit" class="btn btn-sm btn-danger mb-1 mx-1">Tolak</a> 
                                            </form>
                                        @else
                                            <span class="badge bg-light my-2">{{ $datas->status }}</span>    
                                        @endif                                          
                                    @elseif($datas->status == "Ditolak")
                                        <span class="badge bg-danger my-2">{{ $datas->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#showDetailSuratTugas{{ $datas->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="modal fade" id="showDetailSuratTugas{{ $datas->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Surat Tugas</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ url('/surat-tugas/update/'. $datas->id .'') }}"
                                                        enctype="multipart/form-data" method="post">
                                                        @csrf
                                                        <div class="mb-2">
                                                            <label for="id_user">ID Pengguna</label>
                                                            <select name="id_user" class="form-select form-select-sm" {{ ($datas->status == 'Diproses') && (Auth::user()->role == 'st') ? '' : 'disabled' }}>
                                                                @foreach ($user as $item)
                                                                    <option value="{{ $item->id }}" {{ ($item->id == $datas->id_user) ? 'selected' : '' }}>{{ "".$item->id." - ". $item->name ."" }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group mb-2">
                                                                    <label for="no_surat">No Surat</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm @error('no_surat') is-invalid @enderror"
                                                                        name="no_surat" id="no_surat"
                                                                        value="{{ $datas->no_surat }}" {{ ($datas->status == 'Diproses') && (Auth::user()->role == 'st') ? '' : 'readonly' }}>
                                                                    @error('no_surat')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group mb-2">
                                                                    <label for="nomor_izin">No Izin</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm @error('nomor_izin') is-invalid @enderror"
                                                                        name="nomor_izin" id="nomor_izin"
                                                                        value="{{ $datas->nomor_izin }}" {{ ($datas->status == 'Diproses') && (Auth::user()->role == 'st') ? '' : 'readonly' }}>
                                                                    @error('nomor_izin')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group mb-2">
                                                                    <label for="lingkup_kegiatan">Lingkup Kegiatan</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm @error('lingkup_kegiatan') is-invalid @enderror"
                                                                        name="lingkup_kegiatan" id="lingkup_kegiatan"
                                                                        value="{{ $datas->lingkup_kegiatan }}" {{ ($datas->status == 'Diproses') && (Auth::user()->role == 'st') ? '' : 'readonly' }}>
                                                                    @error('lingkup_kegiatan')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group mb-2">
                                                                    <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                                                    <input type="date"
                                                                        class="form-control form-control-sm @error('tanggal_kegiatan') is-invalid @enderror"
                                                                        name="tanggal_kegiatan" id="tanggal_kegiatan"
                                                                        value="{{ $datas->tanggal_kegiatan }}" {{ ($datas->status == 'Diproses') && (Auth::user()->role == 'st') ? '' : 'readonly' }}>
                                                                    @error('tanggal_kegiatan')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group mb-2">
                                                                    <label for="alamat">Alamat</label>
                                                                    <textarea type="text"
                                                                        class="form-control form-control-sm @error('alamat') is-invalid @enderror"
                                                                        name="alamat" id="alamat"
                                                                        value="" rows="3" {{ ($datas->status == 'Diproses') && (Auth::user()->role == 'st') ? '' : 'readonly' }}>{{ $datas->alamat }}</textarea>
                                                                    @error('alamat')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group mb-2">
                                                                    <label for="tanda_tangan">Tanda Tangan</label>
                                                                    @if($datas->status == 'Diproses')
                                                                    <label for="tanda_tangan">Tanda Tangan</label>
                                                                    <input class="form-control @error('tanda_tangan') is-invalid @enderror" id="tanda_tangan" type="file" name="tanda_tangan">
                                                                        @error('tanda_tangan')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    @else
                                                                    <img class="ttd img-fluid" rows="3" src="{{ asset('img/surat_tugas/ttd/'. $datas->tanda_tangan .'') }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group mb-2">
                                                                    <label for="tempat_id">Tempat Tanda Tangan</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm @error('tempat_id') is-invalid @enderror"
                                                                        name="tempat_id" id="tempat_id"
                                                                        value="{{ $datas->tempat_id }}" {{ ($datas->status == 'Diproses') && (Auth::user()->role == 'st') ? '' : 'readonly' }}>
                                                                    @error('tempat_id')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group mb-2">
                                                                    <label for="tanggal_ttd">Tanggal Tanda Tangan</label>
                                                                    <input type="date"
                                                                        class="form-control form-control-sm @error('tanggal_ttd') is-invalid @enderror"
                                                                        name="tanggal_ttd" id="tanggal_ttd"
                                                                        value="{{ $datas->tanggal_ttd }}" {{ ($datas->status == 'Diproses') && (Auth::user()->role == 'st') ? '' : 'readonly' }}>
                                                                    @error('tanggal_ttd')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="nama_penandatangan">Nama Penanda Tangan</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('nama_penandatangan') is-invalid @enderror"
                                                                name="nama_penandatangan" id="nama_penandatangan"
                                                                value="{{ $datas->nama_penandatangan }}" {{ ($datas->status == 'Diproses') && (Auth::user()->role == 'st') ? '' : 'readonly' }}>
                                                            @error('nama_penandatangan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-sm btn-primary" {{ ($datas->status == 'Diproses') && (Auth::user()->role == 'st') ? '' : 'disabled' }}>Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(Auth::user()->role == 'st')
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ url('/surat-tugas/delete/'.$datas->id) }}">Hapus</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-left">
                    Menampilkan
                    {{-- {{ $data->firstItem() }} --}}
                    sampai
                    {{-- {{ $data->lastItem() }} --}}
                    dari
                    {{-- {{ $data->total() }} --}}
                    data
                </div>
                <div class="float-right">
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
