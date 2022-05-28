<?php

namespace App\Http\Controllers;

use App\Models\Kebijakan;
use App\Http\Requests\StoreKebijakanRequest;
use App\Http\Requests\UpdateKebijakanRequest;

class KebijakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Kebijakan::all();
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
     * @param  \App\Http\Requests\StoreKebijakanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKebijakanRequest $request)
    {
        $validatedData = $request->validate([
            'nomor_peraturan' => 'required',
            'nama_peraturan' => 'required',
            'isi_peraturan' => 'required',
            'tempat_di_tempatkan' => 'required',
            'tanggal_di_tetapkan' => 'required',
            'nama_penandatanganan' => 'required',
            'tanda_tangan' => 'required',
        ]);

        Kebijakan::create($validatedData);
        return 'Anda berhasil menambah kebijakan!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kebijakan  $kebijakan
     * @return \Illuminate\Http\Response
     */
    public function show(Kebijakan $kebijakan)
    {
        return Kebijakan::where('id', $kebijakan)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kebijakan  $kebijakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kebijakan $kebijakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKebijakanRequest  $request
     * @param  \App\Models\Kebijakan  $kebijakan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKebijakanRequest $request, Kebijakan $kebijakan)
    {
        $validatedData = $request->validate([
            'nomor_peraturan' => 'required',
            'nama_peraturan' => 'required',
            'isi_peraturan' => 'required',
            'tempat_di_tempatkan' => 'required',
            'tanggal_di_tetapkan' => 'required',
            'nama_penandatanganan' => 'required',
            'tanda_tangan' => 'required',
        ]);

        Kebijakan::where('id', $kebijakan->id)->update($validatedData);
        return 'Anda berhasil update Kebijakan!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kebijakan  $kebijakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kebijakan $kebijakan)
    {
        Kebijakan::destroy($kebijakan->id);
        return 'Anda berhasil menghapus Kebijakan!';
    }
}
