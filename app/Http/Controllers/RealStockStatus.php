<?php

namespace App\Http\Controllers;

use App\Models\RealtimeStatus;
use Illuminate\Http\Request;

class RealStockStatus extends Controller
{
    public function edit($id){

        $data = [
            'realtime_status' => RealtimeStatus::whereId($id)->first(),
            'page' => '',
            'active' => 'dashboard'
        ];
        return view('pages.realtimeStock.edit',$data);
    }

    public function update(Request $request, $id){
        // dd($request);
        RealtimeStatus::where('id',$id)->update([
            'stock_in' => $request->stock_in,
        ]);
    return redirect('/')->with('success', 'Merchandise has been updated!');
    }
}

