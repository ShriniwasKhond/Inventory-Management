<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductHistory extends Model
{
    
    protected $table = 'product_history';

    static public function get_single($id){
		  return self::find($id);
	  }

	  public function getUserName(){
      return $this->belongsTo(User::class, "user_id");
    }

    public function getProductName(){
      return $this->belongsTo(Product::class, "product_id");
    }


    public static function getDecoration()
    {
        $Decoration = DB::table('product_history')
                    ->select('product_history.id','users.name','product.sheet_no','product.asset','product.qty','product_history.available_qty')
                    ->join('users', 'users.id', '=', 'product_history.user_id')
                    ->join('product', 'product.id', '=', 'product_history.product_id')
                    ->get()->toArray();
        return $Decoration;
    }

   
 }