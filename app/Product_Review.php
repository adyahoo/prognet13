<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Review extends Model
{
    protected $table = 'product_reviews';
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
