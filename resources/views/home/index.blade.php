@extends('layout.main') @section('main')

<div class="main__header__mancha"></div>

<iframe style="display: none;" name="iframe"> </iframe>
<div class="main__container Live_Auctions">
    <div class="main__container__header">
        <span>Live Auctions</span>
        <a href="#">Explore more</a>
    </div>
    <div class="main__container__body carousel">

        <div class="carousel__items">
            @foreach($nfts as $nft)
            @include('home.partials.nfts_carousel', ['nft'=>$nft, 'user_id'=>$user_id])
        @endforeach 
        </div>

    </div>
    <div class="main__container__footer"> 
        <button class="iconBtn btnCarousel"><-</button> 
        <div class="button_carousel"></div> 
        <button class="iconBtn btnCarousel">-></button>
    </div>

</div>
<!--
    @ php
    $like = $nft->likes->firstWhere('user_id', Auth::id());
    echo $like; 
    @ endphp


--
<script>
    
var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const btn = document.querySelector('.button__heart')


var actOnLike = btn.addEventListener('click', (e)=>{
    var nftId = e.currentTarget.dataset.nftId;
    fetch('/nfts/' + nftId +'/likes', {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": laravelToken
        },
        method: 'post',
        credentials: "same-origin",
        body: JSON.stringify({
            nft:nftId
        })

    })
})

</script>--> 
	 
@endsection()