@extends('layouts.user')

@section('title', 'Dashboard')

@section('title-page', 'Perizinan')

@section('content')
@php
    use Illuminate\Support\Facades\DB;
    use App\Models\User;
    $user = User::all();
@endphp
@if(Auth::user()->role == 'perizinan' || Auth::user()->role == 'profkeu')
    <div class="mb-3">
        <button type="button" class="btn btn-sm btn-tambah text-light" style="background-color: #0869A6"
            data-toggle="modal" data-target="#tambahPerizinan">{{ (Auth::user()->role == 'perizinan') ? 'Tambah Perizinan' : 'Request Perizinan' }}</button>
        <div class="modal fade" id="tambahPerizinan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ (Auth::user()->role == 'perizinan') ? 'Tambah Perizinan' : 'Request Perizinan' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('perizinan.store') }}" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            @if (Auth::user()->role == 'perizinan')
                            <div class="form-group mb-1">
                                <label for="id_user">ID Pengguna</label>
                                <select name="id_user" class="form-select form-select-sm">
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ "".$item->id." - ". $item->name ."" }}</option>
                                @endforeach
                            </select>
                            </div>
                            @else
                            <input name="id_user" value="{{ Auth::user()->id }}" hidden>
                            @endif
                            <div class="form-group mb-1">
                                <label for="no_izin">Nomor Izin</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('no_izin') is-invalid @enderror"
                                    name="no_izin" id="no_izin" value="{{ old('no_izin') }}">
                                @error('no_izin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="no_induk">Nomor Induk</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('no_induk') is-invalid @enderror"
                                    name="no_induk" id="no_induk" value="{{ old('no_induk') }}">
                                @error('no_induk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="no_register_penilai">Nomor Register Penilai</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('no_register_penilai') is-invalid @enderror"
                                    name="no_register_penilai" id="no_register_penilai"
                                    value="{{ old('no_register_penilai') }}">
                                @error('no_register_penilai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="KJPP">KJPP</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('KJPP') is-invalid @enderror" name="KJPP"
                                    id="KJPP" value="{{ old('KJPP') }}">
                                @error('KJPP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="klasifikasi_izin">Klasifikasi Izin</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('klasifikasi_izin') is-invalid @enderror"
                                    name="klasifikasi_izin" id="klasifikasi_izin"
                                    value="{{ old('klasifikasi_izin') }}">
                                @error('klasifikasi_izin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="tanggal_izin">Tanggal Izin</label>
                                <input type="date"
                                    class="form-control form-control-sm @error('tanggal_izin') is-invalid @enderror"
                                    name="tanggal_izin" id="tanggal_izin"
                                    value="{{ old('tanggal_izin') }}">
                                @error('tanggal_izin')
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
                        <form action="{{ route('perizinan.cari') }}" method="get">
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
                            <h4>Total Perizinan: {{ $total }}</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-head-fixed ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>KJPP</th>
                            <th>Klasifikasi</th>
                            <th>Tanggal</th>
                            <th>Pengaju</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $datas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $datas->KJPP }}</td>
                                <td>{{ $datas->klasifikasi_izin }}</td>
                                <td>{{ $datas->tanggal_izin }}</td>
                                <td>{{ DB::table('users')->select('name')->where('id', $datas->id_user)->value('name') }}
                                </td>
                                <td class="d-flex">
                                    @if($datas->status == "Diterima")
                                        <span class="badge bg-success my-2">{{ $datas->status }}</span>
                                    @elseif($datas->status == "Diproses")
                                        @if(Auth::user()->role == 'perizinan')
                                            <form
                                                action="{{ url('/perizinan/terima/'.$datas->id) }}"
                                                method="post">
                                                @csrf
                                                <input type="text" name="status" value="Diterima" hidden>
                                                <button type="submit"
                                                    class="btn btn-sm btn-warning mb-1 mx-1">Terima</a>
                                            </form>
                                            <form
                                                action="{{ url('/perizinan/tolak/'.$datas->id .'') }}"
                                                method="post">
                                                @csrf
                                                <input type="text" name="status" value="Ditolak" hidden>
                                                <button type="submit" class="btn btn-sm btn-danger mb-1 mx-1">Tolak</a>
                                            </form>
                                        @else
                                            <span class="badge bg-default my-2 text-dark">{{ $datas->status }}</span>
                                        @endif
                                    @elseif($datas->status == "Ditolak")
                                        <span class="badge bg-danger my-2">{{ $datas->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#showDetailPerizinan{{ $datas->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="modal fade" id="showDetailPerizinan{{ $datas->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Perizinan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ url('/perizinan/pengajuan/update/'. $datas->id .'') }}"
                                                        enctype="multipart/form-data" method="post">
                                                        @csrf
                                                        <input name="id_user" value="{{ $datas->id_user }}" hidden>
                                                        <div class="form-group mb-2">
                                                            <label for="no_izin">No Izin</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('no_izin') is-invalid @enderror"
                                                                name="no_izin" id="no_izin"
                                                                value="{{ $datas->no_izin }}"
                                                                {{ ($datas->status === 'Diterima' || Auth::user()->role === 'perizinan') ? 'disabled' : '' }}>
                                                            @error('no_izin')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="no_induk">No Induk</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('no_induk') is-invalid @enderror"
                                                                name="no_induk" id="no_induk"
                                                                value="{{ $datas->no_induk }}"
                                                                {{ ($datas->status === 'Diterima' || Auth::user()->role === 'perizinan') ? 'disabled' : '' }}>
                                                            @error('no_induk')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="no_register_penilai">No Register Penilai</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('no_register_penilai') is-invalid @enderror"
                                                                name="no_register_penilai" id="no_register_penilai"
                                                                value="{{ $datas->no_register_penilai }}"
                                                                {{ ($datas->status === 'Diterima' || Auth::user()->role === 'perizinan') ? 'disabled' : '' }}>
                                                            @error('no_register_penilai')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="KJPP">KJPP</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('KJPP') is-invalid @enderror"
                                                                name="KJPP" id="KJPP" value="{{ $datas->KJPP }}"
                                                                {{ ($datas->status === 'Diterima' || Auth::user()->role === 'perizinan') ? 'disabled' : '' }}>
                                                            @error('KJPP')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="klasifikasi_izin">Klasifikasi Izin</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('klasifikasi_izin') is-invalid @enderror"
                                                                name="klasifikasi_izin" id="klasifikasi_izin"
                                                                value="{{ $datas->klasifikasi_izin }}"
                                                                {{ ($datas->status === 'Diterima' || Auth::user()->role === 'perizinan') ? 'disabled' : '' }}>
                                                            @error('klasifikasi_izin')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="tanggal_izin">Tanggal</label>
                                                            <input type="date"
                                                                class="form-control form-control-sm @error('tanggal_izin') is-invalid @enderror"
                                                                name="tanggal_izin" id="tanggal_izin"
                                                                value="{{ $datas->tanggal_izin }}"
                                                                {{ ($datas->status === 'Diterima' || Auth::user()->role === 'perizinan') ? 'disabled' : '' }}>
                                                            @error('tanggal_izin')
                                                                <span class=" invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button class="btn btn-sm btn-primary" type="submit" {{ ($datas->status === 'Diterima' || Auth::user()->role === 'perizinan') ? 'disabled' : '' }}>Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($datas->status == 'Diproses' || Auth::user()->role == 'perizinan')
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ url('/perizinan/delete/'.$datas->id) }}">Hapus</a>
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
