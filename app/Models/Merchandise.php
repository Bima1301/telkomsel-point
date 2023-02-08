<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    protected $guarded =['id'];
    use HasFactory;

    public function realtimeStatus()
    {
        return $this->hasOne(RealtimeStatus::class);
    }
    public function storeStock()
    {
        return $this->hasMany(StoreStock::class);
    }
}
