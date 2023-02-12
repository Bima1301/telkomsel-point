<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use App\Models\RealtimeStatus;
use App\Models\Store;
use App\Models\StoreStock;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreStockController extends Controller
{
    public function create($idStore)
    {
        // dd($idStore);
        $data = [
            'merchandise' => Merchandise::get(),
            'id_store' => $idStore,
            'store_name' => Store::where('id', '=' ,$idStore)->get('store_name'),
            'page' => 'Store |',
            'active' => 'store'
        ];
        // dd($data);
        return view('pages.storeStock.create',$data);
    }

    public function store(Request $request, $id)
    {
        $StockOutLama=Merchandise::where('merchandises.id', '=', $request->id_merchandise)->join('realtime_statuses', 'merchandises.realtime_status_id', '=', 'realtime_statuses.id')->first(); 
        // dd($StockOutLama);
        $rules = [
            'id_merchandise' => ['required', Rule::unique('store_stocks', 'id_merchandise')->where(fn ($query) => $query->where('id_store', $id))],
            'date' => ['required'],
            'stock_in' => 'required|numeric|integer|min:0',
            'PIC' => 'required|max:255'
        ];
        $validatedData = $request->validate($rules);
        $validatedData['id_store'] = $id;
        $validatedData['stock_out'] = 0;
        $validatedData['user_id'] = auth()->user()->id;
        $storeStock = StoreStock::create($validatedData);

        

        $stock_in_now = $storeStock->stock_in;

        $stock_out_old = $StockOutLama->stock_out;

        $stock_out_now = $stock_in_now + $stock_out_old;

        RealtimeStatus::where('id',$StockOutLama->realtime_status_id)->update([
            'stock_out' => $stock_out_now
        ]);
        return redirect()->route('store.show', [$id])->with('success', 'Store stock has been added!');
    }

    public function edit($idStoreStock, $idStore){

        $data = [
            'store_stock' => StoreStock::where('id' ,'=',$idStoreStock)->first(),
            'merchandise' => Merchandise::get(),
            'id_store_stock' => $idStoreStock,
            'id_store' => $idStore,
            'page' => 'Store |',
            'active' => 'store'
        ];
        return view('pages.storeStock.edit',$data);
    }
    public function update(Request $request, $idStoreStock, $idStore)
    {
        // dd($request);
        $StockOutLama=Merchandise::where('merchandises.id', '=', $request->id_merchandise)->join('realtime_statuses', 'merchandises.realtime_status_id', '=', 'realtime_statuses.id')->first(); 

        $stock_out_old = $StockOutLama->stock_out; // DATA STOCK OUT SEBELUM
        $stock_in_old_temp = StoreStock::where('id' ,'=' , $idStoreStock)->first();
        $stock_in_old = $stock_in_old_temp->stock_in;

        $stock_before_update = $stock_out_old - $stock_in_old;
        // dd($stock_before_update );
        $rules = [
            'id_merchandise' => 'required',
            'date' => 'required',
            'stock_in' => 'required|numeric|integer|min:0',
            'PIC' => 'required|max:255'
        ];
        $validatedData = $request->validate($rules);
        $validatedData['id_store'] = $idStore;
        $validatedData['stock_out'] = 0;
        $validatedData['user_id'] = auth()->user()->id;
        // $storeStock = StoreStock::create($validatedData);
        StoreStock::where('id',$idStoreStock)->update($validatedData);
        

        $stock_in_edit = $request->stock_in;
        $stock_for_update = $stock_before_update + $stock_in_edit;

        RealtimeStatus::where('id',$StockOutLama->realtime_status_id)->update([
            'stock_out' => $stock_for_update
        ]);

        return redirect()->route('store.show', [$idStore])->with('success', 'Store stock has been updated!');
    }
    public function destroy($idStoreStock,$idStore)
    {
        StoreStock::destroy($idStoreStock);
        return redirect()->route('store.show', [$idStore])->with('success', 'Store stock has been deleted!');


    }
}
