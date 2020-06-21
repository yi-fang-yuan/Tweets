<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getAvatarAttribute($value){
     return asset($value ?: 'https://i.pravatar.cc/200?u=' .$this->username);
    }
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    //Gets the Tweets of everyone that user follows
    //in descending order by date
    public function timeline(){
        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);
        return Tweet::whereIn('user_id',$ids)->withLikes()->latest()->get();

    }
    //Gets the Tweets from only the current user
    public function tweets(){
     return $this->hasMany(Tweet::class);
    }

    public function path($append = ''){
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }
    //Follow another user

    //Every user followed by the current user


}
