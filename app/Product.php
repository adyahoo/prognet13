<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'price', 'description', 'stock', 'weight'];
    public function product_image()
    {
    	return $this->hasOne('App\Product_Image');
    }

    public function product_review()
    {
    	return $this->hasOne('App\Product_Review');
    }
    
    public function category_detail()
    {
    	return $this->hasOne('App\Category_Detail');
    }
}
