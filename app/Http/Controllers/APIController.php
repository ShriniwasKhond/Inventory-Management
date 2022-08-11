<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductHistory;
use Hash;
use Auth;

class APIController extends Controller {
 
    public function app_login(Request $request) {

        //email - password
        
        if(!empty($request->email) && !empty($request->password)){
              $getresultCount = User::where('email', '=', $request->email)->count();
              if(!empty($getresultCount)){
            $user = User::where('email', '=', $request->email)->first();

           if($user->is_deleted == 0){
            if(!empty($user)){
                $check = Hash::check($request->password, $user->password);
                if (!empty($check)) {
                
                    $json['status'] = 1;
                    $json['message'] = 'Record found.';
                    $json['result'] = $this->getProfileUser($user->id);
                }else{
                    $json['status'] = 0;
					$json['message'] = 'Your email or password is incorrect please try again.';
                }
               
            }else{
                $json['status'] = 0;
				$json['message'] = 'You are trying to login with wrong user.';
            }
        }else{
            $json['status'] = 0;
            $json['message'] = 'You are not allowed to do this action because You are blocked by admin.';
        }
           }else{
            $json['status'] = 0;
            $json['message'] = 'Record not found.';
        }
        }else{
            $json['status'] = 0;
            $json['message'] = 'Due to some error please try again.';
        }
        echo json_encode($json);
    }

    public function getProfileUser($id)
	{
		$user 				    = User::find($id);
		$json['user_id']		= $user->id;
		$json['name'] 			= !empty($user->name) ? $user->name : '';
		$json['email'] 		    = !empty($user->email) ? $user->email : '';
		return $json;
	}

    
    // tag_number
    public function app_get_asset_details(Request $request){
        if(!empty($request->tag_number) && !empty($request->main_category)){

        $getresultCount = Product::where('sheet_no', '=', $request->tag_number)->count();
         $getresultCountMain = Product::where('main_category', '=', $request->main_category)->count();
		if(!empty($getresultCount) && !empty($getresultCountMain)){
		// $result = array();

        $value = Product::where('sheet_no', '=', $request->tag_number)->where('main_category', '=', $request->main_category)->first();
        if(!empty($value)){
        // dd($request->main_category);
        $data = array();
                // foreach ($getresult as $value) {
                    $data['table_id']     	= $value->id;
        			$data['tag_number']	    = $value->sheet_no;
                  //  $data['date']	        = date('d-m-Y', strtotime($value->product_date));
                    $data['location']       = !empty($value->location) ? $value->location : '';
                    $data['sub_location']   = !empty($value->sub_location) ? $value->sub_location : '';
                    $data['date']           = !empty($value->item_code) ? $value->item_code : '';
                    $data['asset']          = !empty($value->asset) ? $value->asset : '';
                    $data['main_category']  = !empty($value->main_category) ? $value->main_category : '';
                    $data['category']       = !empty($value->category) ? $value->category : '';
                    $data['uom']            = !empty($value->uom) ? $value->uom : '';
                    $data['qty']	        = !empty($value->qty) ? $value->qty : '0';
                    $data['available_qty']	= !empty($value->available_qty) ? $value->available_qty : '0';
                    $data['status']         = $value->status;
                    // $result[] = $data;
                // }
                    $json['status'] = 1;
        			$json['message'] = 'All data loaded successfully.';
        	     	$json['result']  = $data;
                    }else
                {   
                    $json['status'] = 0;
                    $json['message'] = 'Record not found.';
                }
            }
    		else
    		{	
    			$json['status'] = 0;
    			$json['message'] = 'Record not found.';
    		}
        }else{
            $json['status'] = 0;
            $json['message'] = 'Parameter missing!'; 
        }
		echo json_encode($json);
    }

     
    // tag_number  - available_qty

    public function app_update_quantity(Request $request){

         $getresultCount = User::where('id', '=', $request->user_id)->count();
        
        if(!empty($getresultCount)){
            $user = User::where('id', '=', $request->user_id)->first();

           if($user->is_deleted == 0){

        if (!empty($request->tag_number) && !empty($request->available_qty) && !empty($request->status) && !empty($request->main_category)) {
            //$update_record = Product::find($request->tag_number);
            $update_record = Product::where('sheet_no', '=', $request->tag_number)->where('main_category', '=', $request->main_category)->first();
            //if($update_record->qty >= $request->available_qty){

                if(!empty($update_record)){
                   
                //    $LessQty = $update_record->qty - $request->available_qty;
                //    $update_record->qty = $LessQty;
                   
                   $update_record->available_qty = trim($request->available_qty);
                   $update_record->status = trim($request->status);
                   $update_record->save();
                   // $user_id     = Auth::user()->id;
                   // dd($user_id); 
                    //dd($request->user_id);

                   $save_option = new ProductHistory;
                   $save_option->user_id = $request->user_id;
                   $save_option->product_id = $update_record->id;
                   $save_option->available_qty = $request->available_qty;
                   $save_option->save();

                   $json['status'] = 1;
                   $json['message'] = 'Product updated successfully.';
   
                   $json['result'] = $this->getProductList($update_record->id);
                }else {
                   $json['status'] = 0;
                   $json['message'] = 'Invalid Product.';
                }
            // }else{
            //     $json['status'] = 0;
    	    //    	$json['message'] = 'No Qty available.';
            // }
   
           } 
           else 
           {
   
               $json['status'] = 0;
               $json['message'] = 'Parameter missing!';
           }
           }else{
            $json['status'] = 0;
            $json['message'] = 'You are not allowed to do this action because You are blocked by admin.';
        }
        }else{
            $json['status'] = 0;
            $json['message'] = 'Invalid User';
        }
           echo json_encode($json);

    }

    public function getProductList($id)
	{
		$product 			    = Product::find($id);
		$json['table_id']		= $product->id;
		$json['tag_number'] 	= !empty($product->sheet_no) ? $product->sheet_no : '';
       // $json['date']	        = date('d-m-Y', strtotime($product->product_date));
		$json['location'] 		= !empty($product->location) ? $product->location : '';
        $json['sub_location']   = !empty($product->sub_location) ? $product->sub_location : '';
        $json['date']           = !empty($product->item_code) ? $product->item_code : '';
        $json['asset']          = !empty($product->asset) ? $product->asset : '';
        $json['main_category']  = !empty($product->main_category) ? $product->main_category : '';
        $json['category']       = !empty($product->category) ? $product->category : '';
        $json['qty']		    = !empty($product->qty) ? $product->qty : '0';
        $json['uom']            = !empty($product->uom) ? $product->uom : '';
        $json['available_qty']	= !empty($product->available_qty) ? $product->available_qty : '0';
        $json['status']         = $product->status;

        // $option_main = array();

        // foreach($product->getProductHistory as $option)
        // {
        //     $data = array();
        //     $data['id']         = $option->id;
        //     $option_main[] = $data;
        // }
        // $json['product_history']      = $option_main;

		return $json;
	}


    public function app_user_update_quantity_history(Request $request){
        $getresultCount = ProductHistory::where('user_id', '=', $request->user_id)->count();
        if(!empty($getresultCount)){
 $user = User::where('id', '=', $request->user_id)->first();

           if($user->is_deleted == 0){

         $result = array();

        $getresult = ProductHistory::where('user_id', '=', $request->user_id)->get();

        foreach ($getresult as $value) {
            $data['table_id']       = $value->id;
            $data['user_id']        = $value->user_id;
            $data['product_id']     = $value->product_id;
            $data['available_qty']  = !empty($value->available_qty) ? $value->available_qty : '0';

            $data['tag_number']  = !empty($value->getProductName->sheet_no) ? $value->getProductName->sheet_no : '';
            //$data['date']  = date('d-m-Y', strtotime($value->getProductName->product_date));
            $data['date']  = !empty($value->getProductName->item_code) ? $value->getProductName->item_code : '';
            $data['location']  = !empty($value->getProductName->location) ? $value->getProductName->location : '';
            $data['sub_location']  = !empty($value->getProductName->sub_location) ? $value->getProductName->sub_location : '';
            $data['asset']  = !empty($value->getProductName->asset) ? $value->getProductName->asset : '';
            $data['main_category']  = !empty($value->getProductName->main_category) ? $value->getProductName->main_category : '';
            $data['category']  = !empty($value->getProductName->category) ? $value->getProductName->category : '';
            $data['qty']  = !empty($value->getProductName->qty) ? $value->getProductName->qty : '0';
            $data['uom']  = !empty($value->getProductName->uom) ? $value->getProductName->uom : '';
            $data['status']  = !empty($value->getProductName->status) ? $value->getProductName->status : '';

            $result[] = $data;
        }
            $json['status'] = 1;
            $json['message'] = 'All data loaded successfully.';
            $json['result']  = $result;
         }else{
            $json['status'] = 0;
            $json['message'] = 'You are not allowed to do this action because You are blocked by admin.';
        }
        }

        else
        {   
            $json['status'] = 0;
            $json['message'] = 'Record not found.';
        }

        echo json_encode($json); 
    }


}