<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function index()
    {
        return view('conversations.index', [
            'conversations' => Conversation::all()
        ]);
    }

    public function show(Conversation $conversation)
    {

        //$this->authorize('view', $conversation); //for authorizing a conversation before we can show it

        return view('conversations.show', [
            'conversation' => $conversation
        ]);
    }
}
