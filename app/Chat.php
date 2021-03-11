<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table='chats';
    public function chatsmessage()
    {
    return $this->hasMany('App\Chat_message', 'chat_id', 'chat_id');
    }

}
