<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'genre_id',
        'outline',
        'url',
    ];

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function scopeAreaSearch($query,$area){
        if(!empty($area)){
            $query->where('area_id', $area);
        }
    }

    public function scopeGenreSearch($query,$genre){
        if(!empty($genre)){
            $query->where('genre_id', $genre);
        }
    }

    public function scopeNameSearch($query,$name){
        if(!empty($name)){
            $query->where('name', 'like','%'.$name.'%');
        }
    }

    public function scopeShopSearch($query,$shop){
        if(!empty($shop)){
            $query->where('id', $shop);
        }
    }

}
