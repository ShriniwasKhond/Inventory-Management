<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;

class AuthController extends Controller{
	
	public function login(Request $request)
  	{
  		if (Auth::check()) {
			return redirect('admin/dashboard');
		}
       return view('auth.login');
	}

	public function post_login(Request $request)
	{
		if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){
			
			if(empty(Auth::user()->status)){
				if(Auth::user()->is_admin == 1){
					return redirect()->intended('admin/dashboard');
				}else{
					Auth::logout();
					return redirect()->back()->with('error', 'Please enter the correct credentials');	
				}
			}else{
				Auth::logout();
				return redirect()->back()->with('error', 'Please enter the correct credentials');
			}
		}else{
			return redirect()->back()->with('error', 'Please enter the content credentials');
		}
	}

	public function logout(Request $request)
	{
		Auth::logout();
		return redirect(url('/'));
	}

}

?>