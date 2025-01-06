<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'user_id',
    ];

    public function scopeUseridSearch($query,$user){
        if(!empty($user)){
            $query->where('user_id',$user);
        }
    }

    public function scopeShopidSearch($query,$shop){
        if(!empty($shop)){
            $query->where('shop_id',$shop);
        }
    }
}
