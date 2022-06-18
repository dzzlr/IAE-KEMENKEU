<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Http\Request;
use App\Http\Requests\StorePerizinanRequest;
use App\Http\Requests\UpdatePerizinanRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class PerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = json_decode(Http::get('https://radiant-castle-03940.herokuapp.com/api/perizinan'));
        return view('admin.showPerizinan', compact('data'));
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
     * @param  \App\Http\Requests\StorePerizinanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_izin' => 'required',
            'id_user' => 'required',
            'KJPP' => 'required',
            'tanggal_izin' => 'required',
            'klasifikasi_izin' => 'required',
            'no_register_penilai' => 'required',
            'no_induk' => 'required',
        ]);

        Perizinan::create($validatedData);
        return 'Anda berhasil menambah Perizinan!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perizinan  $perizinan
     * @return \Illuminate\Http\Response
     */
    public function show(Perizinan $perizinan)
    {
        return Perizinan::where('id', $perizinan)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perizinan  $perizinan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perizinan $perizinan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerizinanRequest  $request
     * @param  \App\Models\Perizinan  $perizinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perizinan $perizinan)
    {
        $validatedData = $request->validate([
            'no_izin' => 'required',
            'id_user' => 'required',
            'KJPP' => 'required',
            'tanggal_izin' => 'required',
            'klasifikasi_izin' => 'required',
            'no_register_penilai' => 'required',
            'no_induk' => 'required',
        ]);

        Perizinan::where('id', $perizinan->id)->update($validatedData);
        return 'Anda berhasil update Perizinan!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perizinan  $perizinan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perizinan $perizinan)
    {
        Perizinan::destroy($perizinan->id);
        return 'Anda berhasil menghapus Kebijakan!';
    }
}
