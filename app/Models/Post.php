<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    use HasFactory;

    //Relación uno a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relación de muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Relación polimorfica de uno a uno
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function getRouteKeyName(){
        return 'slug';
    }

}
