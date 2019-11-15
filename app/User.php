<?php

namespace App;

use App\Notifications\MailResetPasswordNotification;
use App\Notifications\VerifyMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastName', 'email', 'password','categorie','is_admin'
    ];
    protected $attributes=['is_admin'=> 0];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordNotification($token));
    }
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyMail());
    }

    public function messages(){

        return $this->hasMany(message_users::class);
    }
/*/
    public function getAdminAttribute($attributes){
        return $this->getAdminOption()[$attributes];
    }
    public function getAdminOption(){
        return [

            '0' =>'noAdmin',
            '1' =>'admin',
        ];
    }
*/

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
