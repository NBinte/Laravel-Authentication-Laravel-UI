<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reply;


class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];


    public function setBestReply(Reply $reply)
    {

        $this->best_reply_id = $reply->id;

        $this->save();
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
