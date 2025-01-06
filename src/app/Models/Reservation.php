<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'user_id',
        'date',
        'time',
        'headcount',
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function scopeIdSearch($query,$id){
        if(!empty($id)){
            $query->where('id',$id);
        }
    }

    public function scopeUseridSearch($query,$user){
        if(!empty($user)){
            $query->where('user_id',$user);
        }
    }
}
