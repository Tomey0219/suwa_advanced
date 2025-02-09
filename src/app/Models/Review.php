<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'star',
        'comment',
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
    
}
