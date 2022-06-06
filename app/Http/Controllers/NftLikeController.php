<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nft;
use App\Models\Like;  
use Illuminate\Support\Facades\Auth;

class NftLikeController extends Controller
{
    public function index(Nft $nft, Like $like)
    {
        $like->delete();

        return $nft->likes()->count();
    }
    public function store(Nft $nft){
        $like = $nft->likes()->create(
            [
                'user_id' => Auth::id(),
            ]
        ); 
        $likeId = $like->id;
        return $likeId; 
    }

    public function destroy(Nft $nft, Like $like)
    {
        $like->delete();

        return $nft->likes()->count();
    }
}
