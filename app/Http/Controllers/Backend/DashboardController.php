<?php

namespace App\Http\Controllers\Backend;
// use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class DashboardController extends Controller
{
	public function dashboard_index(Request $request)
	{
		$data['meta_title'] = 'Dashboard List';
		return view('backend.dashboard.list', $data);
	}

}

?>