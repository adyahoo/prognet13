<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    protected $table = 'product_category_detail';
    protected $fillable = ['product_id', 'category_id'];
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
    public function category()
    {
    	return $this->belongsTo('App\Categories');
    }
}
