<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\image;
use App\Models\Mark;


class Product extends Model
{
    use HasFactory;


    public function images(){
        return $this->hasMany(Image::class,'product_id');
    }

    public function mark(){
        return $this->belongsTo(Mark::class,'mark_id');
    }
}
