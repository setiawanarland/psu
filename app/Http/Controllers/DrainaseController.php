<?php

namespace App\Http\Controllers;

use App\Models\Drainase;
use App\Http\Requests\StoreDrainaseRequest;
use App\Http\Requests\UpdateDrainaseRequest;

class DrainaseController extends Controller
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
     * @param  \App\Http\Requests\StoreDrainaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDrainaseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drainase  $drainase
     * @return \Illuminate\Http\Response
     */
    public function show(Drainase $drainase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drainase  $drainase
     * @return \Illuminate\Http\Response
     */
    public function edit(Drainase $drainase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDrainaseRequest  $request
     * @param  \App\Models\Drainase  $drainase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDrainaseRequest $request, Drainase $drainase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drainase  $drainase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drainase $drainase)
    {
        //
    }
}
