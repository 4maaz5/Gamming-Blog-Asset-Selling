<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table='assets';
    protected $fillable=[
         'asset_id',
         'user_id',
         'review_body',

    ];
    public function review(){
        return $this->hasMany(Review::class, 'asset_id', 'id');
    }
    public function category(){
        return $this->belongTo(Category::class,'asset_id', 'id');
    }
}
