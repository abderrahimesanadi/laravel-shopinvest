<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Mark extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class,'mark_id');
    }
}
