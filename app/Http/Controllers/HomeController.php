<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use App\Models\Collection;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {



        //$nfts = Nft::with('author')->get();
        
    

        $user_id = auth()->id();
        $verification = auth()->id();
    
        $nfts = Nft::with('author')->get(); 
        $collections = Collection::all();
        $users= User::all();
        //$likes=Like::all()->groupBy('user_id')
        //->count();

         return view("home.index", compact('nfts','collections','users','user_id'));
    }

}
