<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Merchandise;
use App\Models\Store;
use App\Models\StoreStock;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            // 'stores' => Transaction::latest()->get(),
            'page' => 'Transaction |',
            'active' => 'transaction',
            'stores' => Store::latest()->get()
        ];
        return view('pages.transaction',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // dd($id);
        $data = [
            // 'stores' => Transaction::latest()->get(),
            'page' => 'Transaction |',
            'active' => 'transaction',
            'store_stock' => StoreStock::where('id_store' , '=' , $id)->join('merchandises', 'store_stocks.id_merchandise' , '=' , 'merchandises.id')->select('store_stocks.*', 'merchandises.merch_name')->latest()->get(),
            'store_name' => Store::where('id', '=', $id)->first()
        ];
        // dd($data);
        return view('pages.transaction.create',$data);
    }
    public function createWithStore($idStore)
    {
        // dd($id);
        $data = [
            // 'stores' => Transaction::latest()->get(),
            'page' => 'Transaction |',
            'active' => 'transaction',
            'store_name' => Store::where('id', '=', $idStore)->first(),
            'transaction' => Transaction::where('id_store', '=', $idStore)->join('merchandises' , 'transactions.id_merchandise' , '=' , 'merchandises.id')->latest('transactions.created_at')->get()
        ];
        // dd($data);
        return view('pages.transaction.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request, $idStore)
    {
        // dd($request);
        $rules = [
            'date' => 'required',
            'msisdn' => 'required|numeric',
            'customer' => 'required|max:255',
            'cs_name' => 'required|max:255'
        ];
        $validatedData = $request->validate($rules);
        $validatedData['id_merchandise'] = $request->id_merchandise;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['id_store'] = $idStore;
        $get_stock_out_storeStock = StoreStock::where([ ['id_store', '=', $idStore], ['id_merchandise', '=', $request->id_merchandise] ])->first();

        $new_stock_out_SS = ($get_stock_out_storeStock->stock_out) + 1;
        // dd($get_stock_out_storeStock);

        Transaction::create($validatedData);
        StoreStock::where('id',$get_stock_out_storeStock->id)->update([
            'stock_out' => $new_stock_out_SS
        ]);
        return redirect()->route('transaction.store.show', [$idStore])->with('success', 'Transaction has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
