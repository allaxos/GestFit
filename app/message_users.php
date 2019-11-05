<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message_users extends Model
{
    //
    protected $fillable =[
        'message',
        'fk_user_seeder',
        'fk_user_received',
        ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getCountMessageNotRead(User $user){
        //user_id = user recieved
        $messageNotRed=message_users::where('fk_user_received','=',$user->id)->where('is_read','0');
        return $messageNotRed->count();

    }

}
