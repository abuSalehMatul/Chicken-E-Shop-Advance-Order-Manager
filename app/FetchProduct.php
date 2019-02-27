<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FetchProduct extends Model
{
	public $table = 'tbl_product_categories';

	public $fillable = ['user_id','product_id','category_id'];

	public function products()
	{
		return $this->hasOne('App\products');
	}
}
