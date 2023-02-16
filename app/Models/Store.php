<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded =['id'];
    use HasFactory;

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function storeStock()
    {
        return $this->hasMany(StoreStock::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
