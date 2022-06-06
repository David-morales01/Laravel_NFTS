<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    
    public function users(){
        return $this->belongsTo(Users::class);
    }

    public function nfts(){
        return $this->hasMany(Nft::class);
    }

    public function likes () {
        return $this->morphMany(Like::class, 'likeable');
    }
}
