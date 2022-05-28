<?php

namespace App\Http\Controllers;

use App\Models\Sanksi;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSanksiRequest;
use App\Http\Requests\UpdateSanksiRequest;

class SanksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sanksi::all();
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
     * @param  \App\Http\Requests\StoreSanksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_kebijakan' => 'required',
            'judul_kebijakan' => 'required',
            'nama_penandatanganan' => 'required',
            'tanda_tangan' => 'required',
            'isi' => 'required',
            'tempat_ditetapkan' => 'required',
            'tanggal_ditetapkan' => 'required',
            'tentang' => 'required',
        ]);

        Sanksi::create($validatedData);
        return 'Anda berhasil menambah Sanksi!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sanksi  $sanksi
     * @return \Illuminate\Http\Response
     */
    public function show(Sanksi $sanksi)
    {
        return Sanksi::where('id', $sanksi)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanksi  $sanksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sanksi $sanksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSanksiRequest  $request
     * @param  \App\Models\Sanksi  $sanksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sanksi $sanksi)
    {
        $validatedData = $request->validate([
            'nomor_kebijakan' => 'required',
            'judul_kebijakan' => 'required',
            'nama_penandatanganan' => 'required',
            'tanda_tangan' => 'required',
            'isi' => 'required',
            'tempat_ditetapkan' => 'required',
            'tanggal_ditetapkan' => 'required',
            'tentang' => 'required',
        ]);

        Sanksi::where('id', $sanksi->id)->update($validatedData);
        return 'Anda berhasil update Sanksi!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanksi  $sanksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sanksi $sanksi)
    {
        Sanksi::destroy($sanksi->id);
        return 'Anda berhasil menghapus Sanksi!';
    }
}
