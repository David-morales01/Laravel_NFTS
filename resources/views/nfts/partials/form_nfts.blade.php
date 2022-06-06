
<div class="container_form_nft"> 
    <div>
        <span class="form_title">Preview item</span>
    <div class="nft_item">
        <div class="nft_img">
            <img class="imgNft" src="{{$nft->route_img??''}}" alt="Image Nft">
            
        </div>
        <div class="nft_item_footer">
            <div>
                <span class="title">
                    {{$nft->title??'Title'}}
                </span>
                <span class="bsc">BSC</span>
            </div>
            <div class="section2">
                <div>
                    
                    <div class="user_img">
                        <img src="/{{$user->img_user??''}}" alt="User Image">
                    </div>
                    <div class="row_span">
                        <span class="opaque_color">Creator</span>
                        <span>{{$user->name??''}}</span>
                    </div>
                </div>
                <div class="row_span">
                    <span class="opaque_color">Current Bid</span>
                    <span class="price">{{$nft->price??'Price'}} ETH</span>
                </div>
            </div>
        </div>
    </div>   
    
    </div>
 
      
        @php
        $action = isset($nft)
        ? route('nfts.update', ['nft' => $nft->id])
        : route('nfts.store');
        @endphp

        <form action="{{$action}}" method="post" class="form" enctype="multipart/form-data" >
            
            @if(isset($nft))
            @method('patch')
         
           
            @endif
            @csrf
            <span class="form_title">Upload file</span>
            
            <div class="drop_area"> 
                    <button type="button">PNG, JPG, GIF, WEBP or MP4. Max 200mb.</button type="button">
                    <input type="file" name="imgNft" id="imgNft" class="inputFile" style="display: none" accept="image/*">
                
            </div>
            
            <label>
                <span class="form_title">
                    Price
                </span>
                <input type="number" min="1"  id="price" name="price" placeholder="Enter price for one item (ETH)" value="{{$nft->price ??''}}">
            </label>
            <label>
                <span class="form_title">
                    Title
                </span>
                
            <input type="text" id="title" name="title" placeholder="Item Name" value="{{$nft->title??''}}">
            </label>
            <label>
                <span class="form_title">
                    Description
                </span>
                <textarea name="description" id="description" cols="30" rows="4" placeholder="e.g. “This is very limited item”">{{$nft->description??''}}</textarea>
            </label>
            <div class="form_nft_options">
                <label>
                    <span class="form_title">
                        Royalties
                    </span>
                    <input type="number" name="royalties" min="1" max="100" placeholder="5%" value="{{$nft->royalties??''}}">
                </label>
                <label>
                    <span class="form_title">
                        Size
                    </span>
                    <input type="number" min="1" max="100" name="size" placeholder="e.g. “size”" value="{{$nft->size??''}}">
                </label>
                <label>
                    <span class="form_title">
                        Collections
                    </span>
                    <select name="collection" id="collection">
                        @foreach($collections as $collection)
                        <option 
                        value="{{ $collection->id }}"
                        
                        @php 
                        if(isset($nft)){
                            $selected = $collection->id ==$nft->collection_id ? 'selected' : '';
                            echo $selected;
                      
                        }
                         @endphp
                        >{{ $collection->name }}</option>
                    @endforeach
                    </select>
                </label>
            </div> 
            <button class="button">Save</button>
        </form> 
    
</div>