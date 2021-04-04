<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply)
    {


        // if(Gate::denies('update-conversation', $reply->conversation)){
        //     die('handle it this way');
        // } //for specializing how we reposnd like custom redirect

        //authorize that the current user has the permission to set the best reply for the conversation
        // $this->authorize('update-conversation', $reply->conversation);




        $this->authorize('update', $reply->conversation); //ability name and the associated model

        // then set it

        //$reply->conversation->best_reply_id = $reply->id;

        //$reply->conversation->save();

        $reply->conversation->setBestReply($reply);



        // $conversation = $reply->conversation;

        // $this->authorize('update', $conversation);

        // // then set it

        // $conversation->best_reply_id = $reply->id;

        // $conversation->save();


        //redirect back to the conversations page
        return back();
    }
}
