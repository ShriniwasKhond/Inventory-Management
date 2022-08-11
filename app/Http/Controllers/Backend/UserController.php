<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProductHistory;
use Hash;
use DB;

class UserController extends Controller
{
    
    public function user_index(Request $request)
    {
        $getrecord = User::where('is_admin','=', 0)->orderBy('id', 'desc');
        // Search Box Start
        if ($request->idsss) {
            $getrecord = $getrecord->where('users.id', '=', $request->idsss);
        }
        if ($request->name) {
            $getrecord = $getrecord->where('users.name', 'like', '%' . $request->name . '%');
        }
    
        if ($request->email) {
            $getrecord = $getrecord->where('users.email', 'like', '%' . $request->email . '%');
        }
       
        // Search Box End

        $getrecord = $getrecord->paginate(40);
        $data['getrecord'] = $getrecord;

    	$data['meta_title'] = 'User List';
        return view('backend.user.list', $data);
    }


    public function user_create(){
       $data['meta_title'] = 'Add User';
       return view('backend.user.add', $data);
    }

    public function user_store(Request $request)
    {

       $insert_r = request()->validate([
          //'username'            => 'required|alpha_dash|unique:users',
          'email'          => 'required|unique:users',
          'name'            => 'required',
          //'mobile'                => 'required|unique:users|digits:10|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            //'mobile' => 'required|unique:users|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
       //   'mobile' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
          //  'alternate_number' => 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
       ]);


      $insert_r                   = new User;
      $insert_r->name             = trim($request->name);
      $insert_r->email            = trim($request->email);
      $insert_r->password_show    = trim($request->password);
      $insert_r->password         = Hash::make($request->password);
      $insert_r->is_admin         = 0;
      $insert_r->save();
      return redirect('admin/user')->with('success', 'User successfully register.');

    }

    public function user_edit($id, Request $request){
        $data['getrecord'] = User::get_single($id);
        $data['meta_title'] = 'Edit User';
        return view('backend.user.edit', $data);
    }

    public function user_update(Request $request, $id)
    {
        $user_update = User::get_single($id);
        $user_update->name = $request->name;
        
        if(!empty($request->password)){
          $user_update->password_show = $request->password;  
          $user_update->password = Hash::make($request->password);
        }
       
        $user_update->save();
        return redirect('admin/user')->with('success', 'User successfully update.');
    }

    public function user_destroy($id)
    {
        $deleteRecord = User::get_single($id);
        $deleteRecord->delete();

        ProductHistory::where('product_history.user_id','=',$id)->delete();

        return redirect()->back()->with('error', 'User successfully deleted!');
    }

    public function user_is_delete($id){
        $product = DB::table('users')
                ->select('is_deleted')
                ->where('id','=',$id)
                ->first();

        //Check user status
        if($product->is_deleted == '1'){
            $status = '0';
        }else{
            $status = '1';
        }

        //update product status
        $values = array('is_deleted' => $status );
        DB::table('users')->where('id',$id)->update($values);

        return redirect()->back()->with('success', 'User delete has been updated successfully.!');
    }
}