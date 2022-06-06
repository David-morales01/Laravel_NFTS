<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Like; 
use Illuminate\Support\Facades\Auth;

class CollectionLikeControler extends Controller
{
    public function store(Collection $collection){
        $collection->likes()->create(
            [
                'user_id' => Auth::id(),
            ]
        );

        return back();

    }

    public function destroy(Collection $collection, Like $like)
    {
        $like->delete();

        return back();
    }
}
