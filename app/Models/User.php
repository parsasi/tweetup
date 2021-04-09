<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use mysql_xdevapi\CollectionFind;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline(){
        $followTweets = $this->follows->pluck('tweets')->flatten();
        $selfTweets = $this->tweets;
        $allTweets = $followTweets->merge($selfTweets)->sortByDesc('updated_at');
        return $allTweets;
    }

    public function getAvatarAttribute($value){
        return asset($value ?: '/images/default-avatar.jpeg');
    }

    public function setPasswordAttribute($value){
        $this->attributes['password']= bcrypt($value);
    }

    public function tweets(){
        return $this->hasMany(Tweet::class);
    }

    public function following(User $user)
    {
        return $this->follows()
            ->where('following_user_id',$user->id)
            ->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id');
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }


    public function path($append = ''){
        $path = route('profile' , $this->username);
        return $append ? "${path}/${append}" : $path;

    }

}
