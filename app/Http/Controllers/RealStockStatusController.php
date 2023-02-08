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
        // dd($request);
        $rules = [
            'stock_in' => 'required|numeric|integer|min:0',
        ];
        $validatedData = $request->validate($rules);
        RealtimeStatus::where('id',$id)->update($validatedData);
    return redirect('/')->with('success', "Merchandise's stock has been updated!");
    }
}

