<?php

namespace App\Policies;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{

    //think of it as a class that encapsulates an authorization policy for a model //whether you can see the
    //conversation, edit it, update it, delete it all of these things can be contained here



    use HandlesAuthorization;

    // /**
    //  * Determine whether the user can view any models.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return mixed
    //  */
    // public function viewAny(User $user)
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conversation  $conversation
     * @return mixed
     */
    public function view(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }

    // /**
    //  * Determine whether the user can create models.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return mixed
    //  */
    // public function create(User $user)
    // {
    //     //
    // }


    // public function before(User $user){ //policy specific authorization hook

    //     if($user->id == 47){ //admin

    //         return true;

    //     } //use conditionals like this, don't directly return anything or it will ruin the flow

    //     //return $user->id == 46; //result of this will be considered as result of the policy and the
    //     //actual authorization method will never be called
    // }




    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conversation  $conversation
     * @return mixed
     */

    //determine whether the user can update the conversation
    public function update(User $user, Conversation $conversation) //ability method
    {
        ///ddd('hello');

        return $conversation->user->is($user);
    }

    // /**
    //  * Determine whether the user can delete the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Conversation  $conversation
    //  * @return mixed
    //  */
    // public function delete(User $user, Conversation $conversation)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can restore the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Conversation  $conversation
    //  * @return mixed
    //  */
    // public function restore(User $user, Conversation $conversation)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Conversation  $conversation
    //  * @return mixed
    //  */
    // public function forceDelete(User $user, Conversation $conversation)
    // {
    //     //
    // }
}
