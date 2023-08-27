<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = ['src','type'];
    use HasFactory;
    public function imageable(){
        return $this->morphTo();
    }
}
