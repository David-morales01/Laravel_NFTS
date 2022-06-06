<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\nft;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;

class NftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index()
    {
        return view("home.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user =auth()->user(); 
        $collections = Collection::all(); 
        return view('nfts.create', [
            'user'=> $user,
            'collections'=> $collections,
            'nft' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $nft = new Nft();
        $nft -> owner_id = auth()->id();
        $nft -> author_id = auth()->id();
        $nft->title = $request->title; 
        $image = $request->file('imgNft')->store('image','public');
        $path = Storage::url($image);
        $nft->route_img = $path;
        $nft->description = $request->description;
        $nft->price = $request->price;
        $nft->size = $request->size;
        $nft->royalties = $request->royalties;
        $nft -> collection_id = $request->collection;
    
        $nft->save();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nft  $nft
     * @return \Illuminate\Http\Response
     */
    public function show(nft $nft)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nft  $nft
     * @return \Illuminate\Http\Response
     */
    public function edit(nft $nft)
    {
        $this->authorize('author');
        $user =auth()->user(); 
        $collections = Collection::all(); 
        return view('nfts.edit', [
            'user'=> $user,
            'collections'=> $collections,
            'nft' => $nft,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nft  $nft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nft $nft)
    {
        $data = $request->validate();
        $nft->update($data);
        return view("home.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nft  $nft
     * @return \Illuminate\Http\Response
     */
    public function destroy(nft $nft)
    {
        //
    }
}
