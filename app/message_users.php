<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message_users extends Model
{
    //
    protected $fillable =[
        'objet',
        'message',
        'user_id',
        'fk_user_received',
        'conversation_id',
        ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getCountMessageNotRead(User $user){
        //user_id = user recieved
        $messageNotRed=message_users::where('fk_user_received','=',$user->id)->where('is_read','0');
        return $messageNotRed->count();

    }

    public function getListMessageConversation($message){

        $listMessageConversation=message_users::where('conversation_id','=',$message->conversation_id)
            ->where('created_at','<',$message->created_at)
            ->latest()
            ->get();

        return $listMessageConversation;

    }

}
