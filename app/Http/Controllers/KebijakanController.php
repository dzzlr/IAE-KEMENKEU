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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kebijakan  $kebijakan
     * @return \Illuminate\Http\Response
     */
    public function show(Kebijakan $kebijakan)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kebijakan  $kebijakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kebijakan $kebijakan)
    {
        //
    }
}
