<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreStock extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function merchandise()
    {
        return $this->belongsTo(Merchandise::class, 'id_merchandise');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'id_store');
    }
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
