<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'product_categories';
    protected $fillable = ['category_name'];
    public function category_detail()
    {
    	return $this->hasOne('App\Category_Detail');
    }
}
