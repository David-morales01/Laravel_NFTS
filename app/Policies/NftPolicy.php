<?php

namespace App\Policies;

use App\Models\Nft;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class NftPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Nft $nft)
    {
       /*  return $user->id === $nft->user_id
        ? Response::allow()
        : Response::deny('You do not own this post.'); */
        if($user->id == $nft->user_id){
            return true;
        }else{

            return false;
        }
    }
}
