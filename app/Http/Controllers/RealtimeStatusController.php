<?php

namespace App\Http\Controllers;

use App\Models\RealtimeStatus;
use App\Http\Requests\StoreRealtimeStatusRequest;
use App\Http\Requests\UpdateRealtimeStatusRequest;
use App\Models\Merchandise;

class RealtimeStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realtime_Status = Merchandise::join('realtime_statuses', 'merchandises.realtime_status_id' , '=' , 'realtime_statuses.id')->latest('realtime_statuses.created_at')->get();
        $data = [
            'page' => '',
            'active' => 'dashboard',
            'realtime_status' => $realtime_Status
        ];
        return view('pages.index',$data);
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
        // dd($realtimeStatus->stock_in);
        $data = [
            'realtime_status' => $realtimeStatus,
            'page' => '',
            'active' => 'dashboard'
        ];
        return view('pages.realtimeStock.edit',$data);
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
        RealtimeStatus::where('id',$realtimeStatus->id)->update([
            'stock_in' => $request->stock_in,
        ]);
    return redirect('/')->with('success', 'Merchandise has been updated!');
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
