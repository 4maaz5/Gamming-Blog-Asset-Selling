<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable=['user_id','post_id'];
    public function post(){
        return $this->belongsTo(Post::class, 'post_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'user_id','id');
    }
}
