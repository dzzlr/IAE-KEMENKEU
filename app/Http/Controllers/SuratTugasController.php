<?php

namespace App\Http\Controllers;

use App\Models\SuratTugas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSuratTugasRequest;
use App\Http\Requests\UpdateSuratTugasRequest;

class SuratTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SuratTugas::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuratTugasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_surat' => 'required',
            'id_user' => 'required',
            'nomor_izin' => 'required',
            'lingkup_kegiatan' => 'required',
            'alamat' => 'required',
            'tanggal_kegiatan' => 'required',
            'tanda_tangan' => 'required',
            'tempat_id' => 'required',
            'tanggal_ttd' => 'required',
            'nama_penandatangan' => 'required',
        ]);

        SuratTugas::create($validatedData);
        return 'Anda berhasil menambah Surat Tugas!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function show(SuratTugas $suratTugas)
    {
        return SuratTugas::where('id', $suratTugas)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratTugas $suratTugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuratTugasRequest  $request
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratTugas $suratTugas)
    {
        $validatedData = $request->validate([
            'nomor_kebijakan' => 'required',
            'no_surat' => 'required',
            'id_user' => 'required',
            'nomor_izin' => 'required',
            'lingkup_kegiatan' => 'required',
            'alamat' => 'required',
            'tanggal_kegiatan' => 'required',
            'tanda_tangan' => 'required',
            'tempat_id' => 'required',
            'tanggal_ttd' => 'required',
            'nama_penandatangan' => 'required',
        ]);

        SuratTugas::where('id', $suratTugas->id)->update($validatedData);
        return 'Anda berhasil update Surat Tugas!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratTugas $suratTugas)
    {
        SuratTugas::destroy($suratTugas->id);
        return 'Anda berhasil menghapus Surat Tugas!';
    }
}
