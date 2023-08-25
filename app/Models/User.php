<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Post;

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

   
 
 public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function likes()
    {
        return $this->belongsToMany(self::class,'likes','user_id'); // OneTo Many has many child
    }
    
    public function isLike($post) {
        return $this->likes()->where('post_id', $post->id)->exists();
    }
   
   
    //access many Like Through Post   
    public function followers(){
        return $this->belongsToMany(self::class,'followers','follower_id', 'following_id' );
    }

    public function followings(){
        return $this->belongsToMany(self::class,'followers', 'following_id','follower_id' );
    }
    public function isFollowing(User $user)
    {
        return !is_null($this->followings()->where('follower_id', $user->id)->first());
    }
     public function images(){
        return $this->morphMany(Images::class,'imageable');
    }
     public function parent(){
        return $this->belongsToOne(self::class,'posts','parent_id');
    }

}
    

