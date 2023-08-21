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
        return $this->hasMany(Like::class); // OneTo Many has many child
   }
   
   public function receivedLikes()
   {
        return $this->hasManyThrough(Like::class, Post::class);
    }//access many Like Through Post   
    public function followers(){
    return $this->hasMany(self::class);

    }

    }
    

