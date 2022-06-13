<?php

namespace App\Http\Controllers;

use App\Models\Kebijakan;
use App\Models\Sanksi;
use App\Models\Perizinan;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;


class AdminController extends Controller
{
    //
    public function index() {
        return view('admin.index');
    }

    //SECTION KEBIJAKAN
    public function indexKebijakan() {
        $data = dB::table('kebijakan')
                ->select('id','nomor_peraturan', 'nama_peraturan', 'isi_peraturan', 'tempat_di_tetapkan', 'tanggal_di_tetapkan', 'nama_penandatangan', 'tanda_tangan', 'status')
                ->orderBy('kebijakan.created_at', 'DESC')
                ->paginate(10);
        return view('admin.showKebijakan', compact('data'));
    }
    public function cariKebijakan(Request $request) {
        $keyword = $request->cari;
        $data = DB::table('kebijakan')
                ->where('kebijakan.nama_peraturan', 'like', '%'. $keyword .'%')
                ->paginate(10);
        return view('admin.showKebijakan', compact('data'));
    }

    public function storeKebijakan(Request $request)
    {
        $validate = $request->validate([
            'nama_peraturan' => 'required',
            'nomor_peraturan' => 'required',
            'isi_peraturan' => 'required',
            'tempat_di_tetapkan' => 'required',
            'tanggal_di_tetapkan' => 'required',
            'nama_penandatangan' => 'required',
            'tanda_tangan' => 'required'            
        ]);

        if ($foto = $request->file('tanda_tangan')) {
            $destinationPath = 'img/kebijakan/ttd';  
            $fileSource1 = $foto->getClientOriginalName();
            $foto->move($destinationPath, $fileSource1);
        }
        $kebijakan = Kebijakan::create([
            'nama_peraturan' => $request->nama_peraturan,
            'nomor_peraturan' => $request->nomor_peraturan,
            'isi_peraturan' => $request->isi_peraturan,
            'tempat_di_tetapkan' => $request->tempat_di_tetapkan,
            'tanggal_di_tetapkan' => $request->tanggal_di_tetapkan,
            'nama_penandatangan' => $request->nama_penandatangan,
            'tanda_tangan' => $fileSource1           
        ]);           

        return redirect(route('admin.show.kebijakan'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function statusKebijakan($id){
        $data = DB::table('kebijakan')->where('id', $id)->first();

        $status_sekarang = $data->status;

        if($status_sekarang=='Diproses'){
            DB::table('kebijakan')->where('id',$id)->update([
                'status'=>'Diterbitkan'
            ]);
        }

        return redirect(route('admin.show.kebijakan'))->with('success', 'Data Berhasil Diterbitkan');
    }

    public function updateKebijakan(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_peraturan' => 'required',
            'nomor_peraturan' => 'required',
            'isi_peraturan' => 'required',
            'tempat_di_tetapkan' => 'required',
            'tanggal_di_tetapkan' => 'required',
            'nama_penandatangan' => 'required',
            'tanda_tangan' => 'required'            
        ]);

        if ($foto = $request->file('tanda_tangan')) {
            $destinationPath = 'img/kebijakan/ttd';  
            $fileSource1 = $foto->getClientOriginalName();
            $foto->move($destinationPath, $fileSource1);
        }
        $kebijakan = Kebijakan::find($id);
        $kebijakan->nama_peraturan = $request->nama_peraturan;
        $kebijakan->nomor_peraturan = $request->nomor_peraturan;
        $kebijakan->isi_peraturan = $request->isi_peraturan;
        $kebijakan->tempat_di_tetapkan = $request->tempat_di_tetapkan;
        $kebijakan->tanggal_di_tetapkan = $request->tanggal_di_tetapkan;
        $kebijakan->nama_penandatangan = $request->nama_penandatangan;
        $kebijakan->tanda_tangan = $fileSource1;
        $kebijakan->save();

        return redirect(route('admin.show.kebijakan'))->with('success', 'Data Berhasil Diperbarui');
    }

    public function deleteKebijakan($id)
    {
        DB::table('kebijakan')->where('id', $id)->delete();        

        return redirect(route('admin.show.kebijakan'))->with('success', 'Data Berhasil Dihapus');
    }

    //SECTION PERIZINAN
    public function indexPerizinan() {
        $data = dB::table('perizinan')
                ->select('id','id_user', 'no_izin', 'no_induk', 'no_register_penilai', 'KJPP', 'klasifikasi_izin', 'status', 'tanggal_izin')
                ->orderBy('perizinan.created_at', 'DESC')
                ->paginate(10);
        return view('admin.showPerizinan', compact('data'));
    }

    public function cariPerizinan(Request $request) {
        $keyword = $request->cari;
        $data = DB::table('perizinan')
                ->where('perizinan.KJPP', 'like', '%'. $keyword .'%')
                ->paginate(10);
        return view('admin.showPerizinan', compact('data'));
    }

    public function statusPerizinan(Request $request, $id)
    {
        $data = Perizinan::find($id);                    

        $validate = $request->validate([                      
            'status' => 'required'                                  
        ]);

        $data->status = $request->status;                      
        $data->save();
        
        return redirect(route('admin.show.perizinan'))->with('success', 'Data Berhasil Diubah');
    }

    public function deletePerizinan($id)
    {
        DB::table('perizinan')->where('id', $id)->delete();        

        return redirect(route('admin.show.perizinan'))->with('success', 'Data Berhasil Dihapus');
    }

    //SECTION SURAT TUGAS
    public function indexSuratTugas() {
        $data = dB::table('surat_tugas')
                ->select('id','id_user', 'no_surat', 'nomor_izin', 'lingkup_kegiatan', 'alamat', 'tanggal_kegiatan', 'tanda_tangan', 'tempat_id', 'nama_penandatangan', 'status', 'tanggal_ttd')
                ->orderBy('surat_tugas.created_at', 'DESC')
                ->paginate(10);
        return view('admin.showSuratTugas', compact('data'));
    }

    public function cariSuratTugas(Request $request) {
        $keyword = $request->cari;
        $data = DB::table('surat_tugas')
                ->where('surat_tugas.tempat', 'like', '%'. $keyword .'%')
                ->paginate(10);
        return view('admin.showSuratTugas', compact('data'));
    }

    public function updateSuratTugas(Request $request, $id)
    {
        $validate = $request->validate([
            'tempat_id' => 'required',
            'tanggal_ttd' => 'required',
            'nama_penandatangan' => 'required',
            'tanda_tangan' => 'required'            
        ]);

        if ($foto = $request->file('tanda_tangan')) {
            $destinationPath = 'img/surat_tugas/ttd';  
            $fileSource1 = $foto->getClientOriginalName();
            $foto->move($destinationPath, $fileSource1);
        }
        $st = SuratTugas::find($id);
        $st->tempat_id = $request->tempat_id;
        $st->tanggal_ttd = $request->tanggal_ttd;
        $st->nama_penandatangan = $request->nama_penandatangan;
        $st->tanda_tangan = $fileSource1;
        $st->save();

        return redirect(route('admin.show.surat-tugas'))->with('success', 'Data Berhasil Diperbarui');
    }

    public function statusSuratTugas(Request $request, $id)
    {
        $data = SuratTugas::find($id);                    

        $validate = $request->validate([                      
            'status' => 'required'                                  
        ]);

        $data->status = $request->status;                      
        $data->save();
        
        return redirect(route('admin.show.surat-tugas'))->with('success', 'Data Berhasil Diubah');
    }

    public function deleteSuratTugas($id)
    {
        DB::table('surat_tugas')->where('id', $id)->delete();        

        return redirect(route('admin.show.surat-tugas'))->with('success', 'Data Berhasil Dihapus');
    }

    //SECTION SANKSI
    public function indexSanksi() {
        // $data = dB::table('sanksi')
        //         ->select('id','nomor_sanksi', 'nama_sanksi', 'isi_sanksi', 'tempat_ditetapkan', 'tanggal_ditetapkan', 'nama_penandatangan', 'tanda_tangan', 'tentang', 'status')
        //         ->orderBy('sanksi.created_at', 'DESC')
        //         ->paginate(10);

        $sanksi = json_decode(Http::get('https://sanksi.herokuapp.com/api/sanksi'));

        // $sanksi = collect($sanksi);
        

        // return view('admin.showSanksi', compact('data'));
        return view('admin.showSanksi', ['data' => $sanksi]);
    }
    public function cariSanksi(Request $request) {
        $keyword = $request->cari;
        $data = DB::table('sanksi')
                ->where('nama_sanksi', 'like', '%'. $keyword .'%')
                ->paginate(10);
        return view('admin.showSanksi', compact('data'));
    }
    public function storeSanksi(Request $request)
    {
        // $validate = $request->validate([
        //     'nama_sanksi' => 'required',
        //     'nomor_sanksi' => 'required',
        //     'isi_sanksi' => 'required',
        //     'tempat_ditetapkan' => 'required',
        //     'tanggal_ditetapkan' => 'required',
        //     'nama_penandatangan' => 'required',
        //     'tentang' => 'required',
        //     'tanda_tangan' => 'required'            
        // ]);

        // if ($foto = $request->file('tanda_tangan')) {
        //     $destinationPath = 'img/sanksi/ttd';  
        //     $fileSource1 = $foto->getClientOriginalName();
        //     $foto->move($destinationPath, $fileSource1);
        // }
        // $kebijakan = Sanksi::create([
        //     'nama_sanksi' => $request->nama_sanksi,
        //     'nomor_sanksi' => $request->nomor_sanksi,
        //     'isi_sanksi' => $request->isi_sanksi,
        //     'tempat_ditetapkan' => $request->tempat_ditetapkan,
        //     'tanggal_ditetapkan' => $request->tanggal_ditetapkan,
        //     'nama_penandatangan' => $request->nama_penandatangan,
        //     'tentang' => $request->tentang,
        //     'tanda_tangan' => $fileSource1           
        // ]);

        $url = 'https://sanksi.herokuapp.com/api/sanksi/store';
        
        return Redirect::away($url);
        // return redirect(route('admin.show.sanksi'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function statusSanksi($id){
        $data = DB::table('sanksi')->where('id', $id)->first();

        $status_sekarang = $data->status;

        if($status_sekarang=='Diproses'){
            DB::table('sanksi')->where('id',$id)->update([
                'status'=>'Diterbitkan'
            ]);
        }

        return redirect(route('admin.show.sanksi'))->with('success', 'Data Berhasil Diterbitkan');
    }

    public function updateSanksi(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_sanksi' => 'required',
            'nomor_sanksi' => 'required',
            'isi_sanksi' => 'required',
            'tempat_ditetapkan' => 'required',
            'tanggal_ditetapkan' => 'required',
            'nama_penandatangan' => 'required',
            'tentang' => 'required',
            'tanda_tangan' => 'required'            
        ]);

        if ($foto = $request->file('tanda_tangan')) {
            $destinationPath = 'img/sanksi/ttd';  
            $fileSource1 = $foto->getClientOriginalName();
            $foto->move($destinationPath, $fileSource1);
        }
        $sanksi = Sanksi::find($id);
        $sanksi->nama_sanksi = $request->nama_sanksi;
        $sanksi->nomor_sanksi = $request->nomor_sanksi;
        $sanksi->isi_sanksi = $request->isi_sanksi;
        $sanksi->tempat_ditetapkan = $request->tempat_ditetapkan;
        $sanksi->tanggal_ditetapkan = $request->tanggal_ditetapkan;
        $sanksi->nama_penandatangan = $request->nama_penandatangan;
        $sanksi->tentang = $request->tentang;
        $sanksi->tanda_tangan = $fileSource1;
        $sanksi->save();

        return redirect(route('admin.show.sanksi'))->with('success', 'Data Berhasil Diperbarui');
    }

    public function deleteSanksi($id)
    {
        DB::table('sanksi')->where('id', $id)->delete();        

        return redirect(route('admin.show.sanksi'))->with('success', 'Data Berhasil Dihapus');
    }
}
