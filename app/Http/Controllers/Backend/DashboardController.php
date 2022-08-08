<?php

namespace App\Http\Controllers\Backend;
// use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductHistory;
use DB;

class DashboardController extends Controller
{
	public function dashboard_index(Request $request)
	{	

		$data['getProductCategoryA'] = Product::getProductCategoryA($request);
		$data['getProductCategoryB'] = Product::getProductCategoryB($request);
		$data['getProductCategoryC'] = Product::getProductCategoryC($request);
		$data['getProductQTYTotal'] = Product::getProductQTYTotal($request);
		
		$data['getProductCategoryCountA'] = Product::getProductCategoryCountA($request);
		$data['getProductCategoryCountB'] = Product::getProductCategoryCountB($request);
		$data['getProductCategoryCountC'] = Product::getProductCategoryCountC($request);
		$data['getProductCategoryCountTotal'] = Product::getProductCategoryCountTotal($request);
	   // dd($data['getProductCategoryCountTotal']);

		$data['getProductQTYAvailableQtyA'] = ProductHistory::getProductQTYAvailableQtyA($request);
		$data['getProductQTYAvailableQtyB'] = ProductHistory::getProductQTYAvailableQtyB($request);
		$data['getProductQTYAvailableQtyC'] = ProductHistory::getProductQTYAvailableQtyC($request);
		$data['getProductQTYAvailableQtyTotal'] = ProductHistory::getProductQTYAvailableQtyTotal($request);

		$data['getGroupByUserID'] = ProductHistory::select('product_history.user_id','users.name', 		DB::raw('sum(product_history.available_qty) as total_qty'), DB::raw('count(*) as user_id_total'))
				->join('users', 'users.id', '=', 'product_history.user_id')
             	->groupBy('product_history.user_id')
                ->get();
		//dd($data['getGroupByUserID']);

         $data['getProductQtyA'] = ProductHistory::getProductQtyA($request);
         $data['getProductQtyB'] = ProductHistory::getProductQtyB($request);
         $data['getProductQtyC'] = ProductHistory::getProductQtyC($request);
         $data['getProductQTYAvailableQtyTotalSUM'] = ProductHistory::getProductQTYAvailableQtyTotalSUM($request);
		// dd($data['getProductQTYAvailableQtyTotalSUM']);

         $getProductQtyACount = ProductHistory::getProductQtyACount('A');
         $getProductQtyBCount = ProductHistory::getProductQtyACount('B');
         $getProductQtyCCount = ProductHistory::getProductQtyACount('C');

  		 $data['getProductQtyTotalCount'] = $getProductQtyACount + $getProductQtyBCount + $getProductQtyCCount;

         $data['getProductQtyACount'] = $getProductQtyACount;
         $data['getProductQtyBCount'] = $getProductQtyBCount;
         $data['getProductQtyCCount'] = $getProductQtyCCount;


		
		$data['meta_title'] = 'Dashboard List';
		return view('backend.dashboard.list', $data);
	}

}

?>