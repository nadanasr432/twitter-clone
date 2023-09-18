<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'parent_id'
    ];
    public function quotedPost()
    {
        return $this->belongsTo(Post::class, 'quoted_post_id');
    }
     public function likedBy(User $user)
    {
         return $this->likes->contains('user_id', $user->id);
     }
      public function likes()
     {
       return $this->belongsToMany(User::class,'likes','post_id','user_id',);//many to many
    }
     public function retweetedBy(User $user)
    {
         return $this->retweets->contains('user_id', $user->id);
     }
      public function retweets()
     {
       return $this->belongsToMany(User::class,'retweets','post_id','user_id',);//many to many
    }
     
    public function user()
    {
       return $this->belongsTo(User::class);
   }

    public function images(){
        return $this->morphMany(Images::class,'imageable');
    }
    public function parent()
    {
    return $this->belongsTo(self::class,'parent_id');
    }
    public function comments()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class)->withTimestamps();
    }
}
