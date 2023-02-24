<?php

namespace App\Exports;

use App\Invoice;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransactionExport implements FromView
{
    protected $idStore;

    function __construct($idStore)
    {
        $this->idStore = $idStore;
        // dd($this->id);

    }
    public function view(): View
    {
        $data = [
            'transaction' => Transaction::where('transactions.id_store', '=', $this->idStore)->join('store_stocks', 'transactions.id_store_stock', '=', 'store_stocks.id')->leftJoin('merchandises', 'store_stocks.id_merchandise' , '=' , 'merchandises.id')->select('transactions.*', 'merchandises.*', 'store_stocks.date AS store_stock_date')->latest('transactions.created_at')->get()
        ];
        return view('pages.transaction.export', $data);
    }
}
