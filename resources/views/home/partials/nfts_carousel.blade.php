
<div class="nft_item">
    <div class="nft_img"> 
        @php
            $like = $nft->likes->firstWhere('user_id', Auth::id());
        @endphp
        <div class="likecontainer {{$like ? 'likeActivo' : '' }}" data-nft-Id="{{$nft->id}}">
            @php
                $like = $nft->likes->firstWhere('user_id', Auth::id());
            @endphp
           <form data-nft-Id="{{$nft->id}}" action="{{
                $like ? route('nfts.likes.destroy', [$like->id, 'nft'=>$nft->id])
                :  route('nfts.likes.store', ['nft'=>$nft->id])}}" method="post">
                @csrf
                <input type="hidden" class="likeId" name="likeId" value="{{$like->id?? 'nulo'}}"  >
                @if ($like)
                    @method('DELETE')
                    <button data-nft-Id="{{$nft->id}}" type="button" class="iconBtn iconBtndelete">
                @else
                    <button data-nft-Id="{{$nft->id}}" type="button" class="btnheart iconBtn">
                @endif
                <svg  stroke="white" stroke-width="20"    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16"><path d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"  /></svg>
                </button>
                <span class = "LikeCount">{{$nft->likes->count()}}</span>
            </form>

                 
        </div>
        <img src="{{$nft->route_img}}" alt="Image Nft">
        <div class="option_nft">
            @if($user_id === $nft->owner_id)
             <a href="{{route('nfts.edit',['nft'=>$nft->id])}}">Edit my NFT </a>
                 
            @else
                <a href="#">Ofrecer dinero por el </a href="#">
            @endif
        </div>
    </div>
    <div class="nft_item_footer">
        <div>
            <span class="title">
                "{{$nft->title}}"
            </span>
            <span class="bsc">BSC</span>
        </div>
        <div class="section2">
            <div>
                <div class="user_img">
                    <img src="{{$nft->author->img_user}}" alt="User Image">
                </div>
                <div class="row_span">
                    <span class="opaque_color">Creator</span>
                    <span>{{$nft->author->name}}</span>
                </div>
            </div>
            <div class="row_span">
                <span class="opaque_color">Current Bid</span>
                <span class="price">{{$nft->price}} ETH</span>
            </div>
        </div>
    </div>
</div>