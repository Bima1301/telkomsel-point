<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function storeStocks(){
        return $this->belongsTo(User::class, 'id_store_stock');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'id_store');
    }
}
