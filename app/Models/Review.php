<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table='reviews';
    protected $fillable=[
        'asset_id',
        'user_id',
        'review_body'
    ];
    public function asset(){
        return $this->belongsTo(Asset::class, 'asset_id','id');
    }
}
