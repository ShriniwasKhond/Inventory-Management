<?php

namespace App\Http\Controllers\Backend;
// use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;

class MyAccountController extends Controller
{

	public function my_account_index(Request $request)
	{
		$data['user'] = User::find(Auth::user()->id);
		$data['meta_title'] = 'My Account List';
		return view('backend.my_account.list', $data);
	}

	public function my_account_update(Request $request)
	{
		$user = User::find(Auth::user()->id);
		if(!empty($request->password))
		{
			$user->password_show = $request->password;  
			$user->password = Hash::make($request->password);	
		}
		
		$user->email 		= trim($request->email);
		$user->name 		= $request->name;

		$user->save();
        return redirect('admin/user/myaccount')->with('success', 'Account successfully updated!');
	}

}

?>