<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'user_id',
        'sheet_no',
        //'product_date',
        'location',
        'sub_location',
        'item_code',
        'asset',
        'main_category',
        'category',
        'qty',
        'uom',
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



    static public function getProductCategoryA($request)
    {

        return self::select('product.*')
            ->where('category', '=', 'A')
                            ->sum('qty');
    }
    static public function getProductCategoryB($request)
    {

        return self::select('product.*')
            ->where('category', '=', 'B')
                            ->sum('qty');
    }
    static public function getProductCategoryC($request)
    {

        return self::select('product.*')
            ->where('category', '=', 'C')
                            ->sum('qty');
    }

    static public function getProductQTYTotal($request) {
        return self::select('product.*')
                           ->where('category', '!=', '')
                           ->sum('qty');
    }


    static public function getProductCategoryCountA($request){
        $return = self::select('product.*')
                  ->where('category', '=', 'A');
            $return = $return->count();
        return $return;
    }

    static public function getProductCategoryCountB($request){
        $return = self::select('product.*')
                  ->where('category', '=', 'B');
            $return = $return->count();
        return $return;
    }
    
    static public function getProductCategoryCountC($request){
        $return = self::select('product.*')
                  ->where('category', '=', 'C');
            $return = $return->count();
        return $return;
    }

    static public function getProductCategoryCountTotal($request) {
        return self::select('product.*')
                   ->where('category','!=', '')->count();
                           
    }

   

}
