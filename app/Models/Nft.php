<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nft extends Model
{
    
    protected $guarded=[];
    use HasFactory; 

    public function author() {
        return $this->belongsTo(User::class);
    }    
    public function owner_id() {
        return $this->belongsTo(User::class);
    }  
    
    
    public function collections(){
        return $this->belongsTo(Collection::class);
    }

    public function likes () {
        return $this->morphMany(Like::class, 'likeable');
    }

}
