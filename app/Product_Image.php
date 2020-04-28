<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['image_name'];
    
    public function product()
    {
    	return $this->hasOne('App\Product','id','product_id');
    }
}
