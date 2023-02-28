<?php

namespace App\Http\Controllers;

use App\Models\RealtimeStatus;
use Illuminate\Http\Request;

class RealStockStatusController extends Controller
{
    // public function edit($id){

    //     $data = [
    //         'realtime_status' => RealtimeStatus::whereId($id)->first(),
    //         'page' => '',
    //         'active' => 'dashboard'
    //     ];
    //     return view('pages.realtimeStock.edit',$data);
    // }

    public function update(Request $request, $id){
        $stock_out_real = RealtimeStatus::where('id',$id)->first();

        if ($request->stock_in < $stock_out_real->stock_out) {
            return redirect('/')->with('failed', "Merchandise's stock must be greater than stock out!");
        }
        $rules = [
            'stock_in' => 'required|numeric|integer|min:0',
        ];
        $validatedData = $request->validate($rules);
        RealtimeStatus::where('id',$id)->update($validatedData);
    return redirect('/')->with('success', "Merchandise's stock has been updated!");
    }
}

