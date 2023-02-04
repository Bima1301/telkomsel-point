<?php

namespace App\Http\Controllers;

use App\Models\RealtimeStatus;
use App\Http\Requests\StoreRealtimeStatusRequest;
use App\Http\Requests\UpdateRealtimeStatusRequest;

class RealtimeStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreRealtimeStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealtimeStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealtimeStatus  $realtimeStatus
     * @return \Illuminate\Http\Response
     */
    public function show(RealtimeStatus $realtimeStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RealtimeStatus  $realtimeStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(RealtimeStatus $realtimeStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRealtimeStatusRequest  $request
     * @param  \App\Models\RealtimeStatus  $realtimeStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRealtimeStatusRequest $request, RealtimeStatus $realtimeStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealtimeStatus  $realtimeStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealtimeStatus $realtimeStatus)
    {
        //
    }
}
