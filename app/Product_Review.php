<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Product_Review extends Model
{
	use Rateable;

	protected $fillable=[
		'rating',
		'content',
		'product_id'
	];
    protected $table = 'product_reviews';
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function response(){
        return $this->hasMany('App\Response');
    }
}
