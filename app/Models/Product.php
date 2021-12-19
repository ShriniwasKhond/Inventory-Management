<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'user_id',
        'sheet_no',
        'product_date',
        'location',
        'sub_location',
        'asset',
        'qty',
        'available_qty',

        
    ];
	static public function get_single($id){
		return self::find($id);
	}

	public function getUserName(){
      return $this->belongsTo(User::class, "user_id");
   }
   
   public function getProductHistory(){
        return $this->hasMany(ProductHistory::class, "product_id");
    }

}
