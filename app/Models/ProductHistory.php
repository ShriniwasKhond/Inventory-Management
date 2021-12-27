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
                    ->select('product_history.id','users.name','product.sheet_no','product.asset','product.main_category','product.qty','product_history.available_qty')
                    ->join('users', 'users.id', '=', 'product_history.user_id')
                    ->join('product', 'product.id', '=', 'product_history.product_id')
                    ->get()->toArray();
        return $Decoration;
    }

    
    static public function getProductQTYAvailableQtyA($request) {
        $return = DB::table('product_history')
                    ->select('product_history.id','users.name','product.sheet_no','product.asset','product.qty','product_history.available_qty','product.category')
                    ->join('users', 'users.id', '=', 'product_history.user_id')
                    ->join('product', 'product.id', '=', 'product_history.product_id')
                    ->where('product.category', '=', 'A')
                            ->sum('product_history.available_qty');
        return $return;
    }

    static public function getProductQTYAvailableQtyB($request) {
        $return = DB::table('product_history')
                    ->select('product_history.id','users.name','product.sheet_no','product.asset','product.qty','product_history.available_qty','product.category')
                    ->join('users', 'users.id', '=', 'product_history.user_id')
                    ->join('product', 'product.id', '=', 'product_history.product_id')
                    ->where('product.category', '=', 'B')
                            ->sum('product_history.available_qty');
        return $return;
    }

    static public function getProductQTYAvailableQtyC($request) {
        $return = DB::table('product_history')
                    ->select('product_history.id','users.name','product.sheet_no','product.asset','product.qty','product_history.available_qty','product.category')
                    ->join('users', 'users.id', '=', 'product_history.user_id')
                    ->join('product', 'product.id', '=', 'product_history.product_id')
                    ->where('product.category', '=', 'C')
                            ->sum('product_history.available_qty');
        return $return;
    }

    
    static public function getProductQTYAvailableQtyTotal($request) {
        return self::select('product_history.*')
                           ->sum('product_history.available_qty');
    }


    static public function getProductQtyA($request) {
        $return = DB::table('product_history')
                    ->select('product_history.id','product.qty')
                    ->join('product', 'product.id', '=', 'product_history.product_id')
                    ->where('product.category', '=', 'A')
                    ->sum('product.qty');
        return $return;
    }

    static public function getProductQtyB($request) {
        $return = DB::table('product_history')
                    ->select('product_history.id','product.qty')
                    ->join('product', 'product.id', '=', 'product_history.product_id')
                    ->where('product.category', '=', 'B')
                    ->sum('product.qty');
        return $return;
    }

    static public function getProductQtyC($request) {
        $return = DB::table('product_history')
                    ->select('product_history.id','product.qty')
                    ->join('product', 'product.id', '=', 'product_history.product_id')
                    ->where('product.category', '=', 'C')
                    ->sum('product.qty');
        return $return;
    }

    static public function getProductQTYAvailableQtyTotalSUM($request) {
        $return = DB::table('product_history')
                    ->select('product_history.id','product.qty')
                    ->join('product', 'product.id', '=', 'product_history.product_id')
                           ->sum('product.qty');
        return $return;
    }

    static public function getProductQtyACount($type)
    {
        $return = self::select('product_history.id')
                    ->join('product', 'product.id', '=', 'product_history.product_id')
                    ->where('product.category', '=', $type)
                   ->count();
        return $return;
    }


   
 }