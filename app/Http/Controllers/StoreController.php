<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'stores' => Store::latest()->get(),
            'page' => 'Store |',
            'active' => 'store'
        ];
        return view('pages.store',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
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
    public function destroy(Store $store)
    {
        //
    }
}
