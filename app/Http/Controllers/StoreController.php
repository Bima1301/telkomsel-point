<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\StoreStock;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'superUser') {
            # code...
            $data = [
                'stores' => Store::latest()->get(),
                'page' => 'Store |',
                'active' => 'store'
            ];
            return view('pages.store',$data);
        } else {
           return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('superUser');
        $data = [
            'page' => 'Store |',
            'active' => 'store'
        ];
        return view('pages.store.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {
        $this->authorize('superUser');
        Store::create([
            'user_id' => auth()->user()->id,
            'store_name' => $request->store_name,
            'address' => $request->address,
        ]);
        
        return redirect('/store')->with('success', 'New store has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        // $this->authorizeEither('superUser', 'PIC');

        // if((auth()->user()->role !== 'superUser') && (auth()->user()->role !== 'PIC') ){
        //     abort(403);
        // }
        // dd($store);
        if (auth()->user()->role != 'superUser') {
            if (auth()->user()->id_store_position !== $store->id) {
                return redirect()->back();
            } else {
                $data = [
                    'store_name' => $store->store_name,
                    'store_id' => $store->id,
                    'store_stock' => StoreStock::where('id_store' , '=' , $store->id)->join('merchandises', 'store_stocks.id_merchandise' , '=' , 'merchandises.id')->select('store_stocks.*', 'merchandises.merch_name', 'merchandises.image')->latest()->get(),
                    'page' => 'Store |',
                    'active' => 'store'
                ];
            }
        } else {
            $data = [
                'store_name' => $store->store_name,
                'store_id' => $store->id,
                'store_stock' => StoreStock::where('id_store' , '=' , $store->id)->join('merchandises', 'store_stocks.id_merchandise' , '=' , 'merchandises.id')->select('store_stocks.*', 'merchandises.merch_name', 'merchandises.image')->latest()->get(),
                'page' => 'Store |',
                'active' => 'store'
            ];
        }
        
        // dd($data);
        return view('pages.storeStock',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $this->authorize('superUser');
        // dd($store);
        $data = [
            'store' => $store,
            'page' => 'Store |',
            'active' => 'store'
        ];
        return view('pages.store.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreRequest  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $this->authorize('superUser');
        Store::where('id',$store->id)->update([
            'user_id' => auth()->user()->id,
            'store_name' => $request->store_name,
            'address' => $request->address,
        ]);
    
    return redirect('/store')->with('success', 'Store has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Store $store)
    // {
    //     if((auth()->user()->role !== 'superUser') && (auth()->user()->role !== 'PIC') ){
    //         abort(403);
    //     }
    //     // dd($store);
    //     StoreStock::where('id_store', '=' ,$store->id)->delete();
    //     Store::destroy($store->id);
    //     return redirect('/store')->with('success', 'Store has been deleted!');

    // }
}
