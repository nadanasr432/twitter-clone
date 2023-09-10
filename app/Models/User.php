<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Post;





class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'fcm_token'
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
        return $this->belongsToMany(Post::class,'likes', 'user_id', 'post_id'); // OneTo Many has many child
    }
    
    public function isLike($post) {
        return $this->likes()->where('post_id', $post->id)->exists();
    }
   
   
    //access many Like Through Post   
    public function followers(){
        return $this->belongsToMany(self::class,'followers','following_id', 'follower_id' )->where('status','approved');
    }

    public function followings(){
        return $this->belongsToMany(self::class,'followers', 'follower_id','following_id' )->where('status','approved');
    }
    public function requests(){
        return $this->belongsToMany(self::class,'followers','following_id', 'follower_id')->where('status','pending');
    }
    
    public function isFollowing(User $user)
    {
        return !is_null($this->followings()->where('follower_id', $user->id)->first());
    }
     public function images(){
        return $this->morphMany(Images::class,'imageable');
    }
    public function comments()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function getAvatarUrlAttribute()
    {
        // avatar_url
        $avatar = $this->images()->where('type', 'avatar')->first();
        if (!$avatar) {
            return asset('default_avatar.png');
        }
        return asset('images/' . $avatar->src);
    }
   
}
    

