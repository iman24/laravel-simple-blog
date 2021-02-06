<?php

namespace App\Policies;


use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


     public function post(User $user){
        if($user->can('manage post'))
            return true;
     }


}
