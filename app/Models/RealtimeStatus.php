<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealtimeStatus extends Model
{
    protected $guarded =['id'];
    use HasFactory;

    public function merchandise(){
        return $this->belongsTo(Merchandise::class);
    }
}
