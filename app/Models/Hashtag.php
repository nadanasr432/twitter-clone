<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function post(){
        return $this->belongsToMany(Post::class, 'hashtag_post','hashtag_id', 'post_id');
    }
}
