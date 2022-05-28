<?php

namespace App\Http\Controllers;

use App\Models\ProfesiKeuangan;
use App\Http\Requests\StoreProfesiKeuanganRequest;
use App\Http\Requests\UpdateProfesiKeuanganRequest;

class ProfesiKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProfesiKeuangan::all();
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
     * @param  \App\Http\Requests\StoreProfesiKeuanganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfesiKeuanganRequest $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'nik' => 'required',
            'npw' => 'required',
            'nama' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'pangkat' => 'required',
            'gelar' => 'required',
            'jabatan' => 'required',
            'umur' => 'required',
        ]);

        ProfesiKeuangan::create($validatedData);
        return 'Anda berhasil menambah Profesi Keuangan!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfesiKeuangan  $profesiKeuangan
     * @return \Illuminate\Http\Response
     */
    public function show(ProfesiKeuangan $profesiKeuangan)
    {
        return ProfesiKeuangan::where('id', $profesiKeuangan)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfesiKeuangan  $profesiKeuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfesiKeuangan $profesiKeuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfesiKeuanganRequest  $request
     * @param  \App\Models\ProfesiKeuangan  $profesiKeuangan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfesiKeuanganRequest $request, ProfesiKeuangan $profesiKeuangan)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'nik' => 'required',
            'npw' => 'required',
            'nama' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'pangkat' => 'required',
            'gelar' => 'required',
            'jabatan' => 'required',
            'umur' => 'required',
        ]);

        ProfesiKeuangan::where('id', $profesiKeuangan->id)->update($validatedData);
        return 'Anda berhasil update Profesi Keuangan!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfesiKeuangan  $profesiKeuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfesiKeuangan $profesiKeuangan)
    {
        ProfesiKeuangan::destroy($profesiKeuangan->id);
        return 'Anda berhasil menghapus Profesi Keuangan!';
    }
}
