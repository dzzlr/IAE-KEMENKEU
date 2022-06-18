<?php

namespace App\Http\Controllers;
use App\Models\Kebijakan;
use App\Models\Perizinan;
use App\Models\SuratTugas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.index');
    }

    //SECTION PERIZINAN
    public function indexKebijakan() {
        // $data = dB::table('kebijakan')
        //         ->select('id','nomor_peraturan', 'nama_peraturan', 'isi_peraturan', 'tempat_di_tetapkan', 'tanggal_di_tetapkan', 'nama_penandatangan', 'tanda_tangan', 'status')
        //         ->where('status', 'Diterbitkan')
        //         ->orderBy('kebijakan.created_at', 'DESC')
        //         ->paginate(10);
        if (Auth::user()->role == 'kebijakan') {
            $data = json_decode(Http::get('https://safe-tor-70401.herokuapp.com/api/kebijakan'));
        } else {
            $kebijakan = json_decode(Http::get('https://safe-tor-70401.herokuapp.com/api/kebijakan'));
            $data = collect($kebijakan)->where('status', 'Diterbitkan');
        }
        return view('user.showKebijakan', compact('data'));
    }

    //SECTION PERIZINAN
    public function indexPerizinan() {
        // $data = dB::table('perizinan')
        //         ->select('id', 'id_user' ,'no_izin', 'no_induk', 'no_register_penilai', 'KJPP', 'klasifikasi_izin', 'status', 'tanggal_izin')
        //         ->where('id_user', Auth::user()->id)
        //         ->orderBy('perizinan.created_at', 'DESC')
        //         ->paginate(10);
        if (Auth::user()->role == 'perizinan') {
            $data = json_decode(Http::get('https://radiant-castle-03940.herokuapp.com/api/perizinan'));
        } else {
            $perizinan = json_decode(Http::get('https://radiant-castle-03940.herokuapp.com/api/perizinan'));
            $data = collect($perizinan)->where('id_user', Auth::user()->id);
        }
        return view('user.showPerizinan', compact('data'));
    }

    public function cariPerizinan(Request $request) {
        $keyword = $request->cari;
        $data = DB::table('perizinan')
                ->where('perizinan.KJPP', 'like', '%'. $keyword .'%')
                ->paginate(10);
        return view('user.showPerizinan', compact('data'));
    }

    public function storePerizinan(Request $request)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'no_izin' => 'required',
            'no_induk' => 'required',
            'no_register_penilai' => 'required',
            'KJPP' => 'required',
            'klasifikasi_izin' => 'required',
            'tanggal_izin' => 'required'            
        ]);

        $url = 'https://radiant-castle-03940.herokuapp.com/api/perizinan/store';
        $response = Http::post($url, $request->input());
        if($response->getStatusCode() == 200) {
            return redirect(route('perizinan.index'))->with('success', 'Data Berhasil Ditambahkan');
        }
        // $perizinan = Perizinan::create([
        //     'id_user' => $request->id_user,
        //     'no_izin' => $request->no_izin,
        //     'no_induk' => $request->no_induk,
        //     'no_register_penilai' => $request->no_register_penilai,
        //     'KJPP' => $request->KJPP,
        //     'klasifikasi_izin' => $request->klasifikasi_izin,
        //     'tanggal_izin' => $request->tanggal_izin,
        // ]);           

        // return redirect(route('perizinan.index'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function updatePerizinan(Request $request, $id)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'no_izin' => 'required',
            'no_induk' => 'required',
            'no_register_penilai' => 'required',
            'KJPP' => 'required',
            'klasifikasi_izin' => 'required',
            'tanggal_izin' => 'required'            
        ]);

        $url = ('https://radiant-castle-03940.herokuapp.com/api/perizinan/update/'. $id.'');
        $response = Http::put($url, $request->input());
        if($response->getStatusCode() == 200) {
            return redirect(route('perizinan.index'))->with('success', 'Data Berhasil Diperbarui');
        }

        // $perizinan = Perizinan::find($id);
        // $perizinan->no_izin = $request->no_izin;
        // $perizinan->no_induk = $request->no_induk;
        // $perizinan->no_register_penilai = $request->no_register_penilai;
        // $perizinan->KJPP = $request->KJPP;
        // $perizinan->klasifikasi_izin = $request->klasifikasi_izin;
        // $perizinan->tanggal_izin = $request->tanggal_izin;
        // $perizinan->save();   

        // return redirect(route('perizinan.index'))->with('success', 'Data Berhasil Diperbarui');
    }

    public function destroyPerizinan($id)
    {
        // DB::table('perizinan')->where('id', $id)->delete();     
        $delete = Http::delete('https://radiant-castle-03940.herokuapp.com/api/perizinan/delete/'. $id .'');   

        return redirect(route('perizinan.index'))->with('success', 'Data Berhasil Dihapus');
    }

    //SECTION SURAT TUGAS
    public function indexSuratTugas() {
        // $data = dB::table('surat_tugas')
        //         ->select('id','id_user', 'no_surat', 'nomor_izin', 'lingkup_kegiatan', 'alamat', 'tanggal_kegiatan', 'tanda_tangan', 'tempat_id', 'nama_penandatangan', 'status', 'tanggal_ttd')
        //         ->where('id_user', Auth::user()->id)
        //         ->orderBy('surat_tugas.created_at', 'DESC')
        //         ->paginate(10);
        if (Auth::user()->role == 'profkeu') {
            $st = json_decode(Http::get('https://glacial-journey-17938.herokuapp.com/api/surat-tugas'));
            $data = collect($st)->where('id_user', Auth::user()->id);
        } else {
            $data = json_decode(Http::get('https://glacial-journey-17938.herokuapp.com/api/surat-tugas'));
        }
        return view('user.showSuratTugas', compact('data'));
    }

    public function cariSuratTugas(Request $request) {
        $keyword = $request->cari;
        $data = DB::table('surat_tugas')
                ->where('surat_tugas.tempat', 'like', '%'. $keyword .'%')
                ->paginate(10);
        return view('user.showSuratTugas', compact('data'));
    }

    public function storeSuratTugas(Request $request)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'no_surat' => 'required',
            'nomor_izin' => 'required',
            'lingkup_kegiatan' => 'required',
            'alamat' => 'required',
            'tanggal_kegiatan' => 'required',         
        ]);

        $url = 'https://glacial-journey-17938.herokuapp.com/api/surat-tugas/store';
        $response = Http::post($url, $request->input());
        if($response->getStatusCode() == 200) {
            return redirect(route('st.index'))->with('success', 'Data Berhasil Ditambahkan');
        }

        // $perizinan = SuratTugas::create([
        //     'id_user' => $request->id_user,
        //     'no_surat' => $request->no_surat,
        //     'nomor_izin' => $request->nomor_izin,
        //     'lingkup_kegiatan' => $request->lingkup_kegiatan,
        //     'alamat' => $request->alamat,
        //     'tanggal_kegiatan' => $request->tanggal_kegiatan,
        // ]);           

        // return redirect(route('st.index'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function updateSuratTugas(Request $request, $id)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'no_surat' => 'required',
            'nomor_izin' => 'required',
            'lingkup_kegiatan' => 'required',
            'alamat' => 'required',
            'tanggal_kegiatan' => 'required',              
        ]);

        $url = ('https://glacial-journey-17938.herokuapp.com/api/surat-tugas/update/'. $id.'');
        $response = Http::put($url, $request->input());
        if($response->getStatusCode() == 200) {
            return redirect(route('st.index'))->with('success', 'Data Berhasil Diperbarui');
        }
    }

    public function destroySuratTugas($id)
    {
        // DB::table('surat_tugas')->where('id', $id)->delete();        
        $delete = Http::delete('https://glacial-journey-17938.herokuapp.com/api/surat-tugas/delete/'. $id .'');

        return redirect(route('st.index'))->with('success', 'Data Berhasil Dihapus');
    }

    //SECTION SANKSI
    public function indexSanksi() {
        // $data = dB::table('sanksi')
        //         ->select('id','nomor_sanksi', 'nama_sanksi', 'isi_sanksi', 'tempat_ditetapkan', 'tanggal_ditetapkan', 'nama_penandatangan', 'tanda_tangan', 'tentang', 'status')
        //         ->where('status', 'Diterbitkan')
        //         ->orderBy('sanksi.created_at', 'DESC')
        //         ->paginate(10);
        if (Auth::user()->role == 'profkeu') {
            $st = json_decode(Http::get('https://sanksi.herokuapp.com/api/sanksi'));
            $data = collect($st)->where('id_user', Auth::user()->id);
        } elseif (Auth::user()->role == 'sanksi') {
            $data = json_decode(Http::get('https://sanksi.herokuapp.com/api/sanksi'));
        } else {
            $sanksi = json_decode(Http::get('https://sanksi.herokuapp.com/api/sanksi'));
            $data = collect($sanksi)->where('status', 'Diterbitkan');
        }
        return view('user.showSanksi', compact('data'));
    }

    public function cariSanksi(Request $request) {
        $keyword = $request->cari;
        $data = DB::table('sanksi')
                ->where('nama_sanksi', 'like', '%'. $keyword .'%')
                ->paginate(10);
        return view('user.showSanksi', compact('data'));
    }
}
