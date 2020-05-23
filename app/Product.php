<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['product_name', 'price', 'description', 'stock', 'weight'];
    
    public function product_image()
    {
    	return $this->hasMany('App\Product_Image');
    }

    public function product_review()
    {
    	return $this->hasMany('App\Product_Review');
    }
    
    public function category_detail()
    {
    	return $this->hasOne('App\Category_Detail');
    }

    public function getStar(){
        $sumStar = $this->product_review()->sum('rating');
        $average = $sumStar/$this->product_review()->count();
        return $average;
    }
}
