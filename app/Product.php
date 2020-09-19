<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;

    protected $table = "product";
    protected $guarded = [];
    public function details(){
        return $this->hasMany('App\ProductDetails','product_id');
    }
}
