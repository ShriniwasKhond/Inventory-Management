<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Imports\ProductImport;

use Maatwebsite\Excel\Facades\Excel;
use Hash;
use DB;
use Auth;

class ProductController extends Controller
{
    
    public function product_index(Request $request)
    {
        $getrecord = Product::orderBy('id', 'desc');
        // Search Box

        if ($request->idsss) {
            $getrecord = $getrecord->where('product.id', '=', $request->idsss);
        }

        if ($request->product_date) {
            $getrecord = $getrecord->where('product.product_date', 'like', '%' . $request->product_date . '%');
        }

        if ($request->sheet_no) {
            $getrecord = $getrecord->where('product.sheet_no', 'like', '%' . $request->sheet_no . '%');
        }
        
        if ($request->location) {
            $getrecord = $getrecord->where('product.location', 'like', '%' . $request->location . '%');
        }

        if ($request->qty) {
            $getrecord = $getrecord->where('product.qty', '=', $request->qty);
        }
       
        //  Search Box
        $getrecord = $getrecord->paginate(60);
        $data['getrecord'] = $getrecord;

        $data['meta_title'] = 'Product List';
        return view('backend.product.list', $data);
    }

    public function product_add_import(){
         $data['meta_title'] = 'Import Excel';
        return view('backend.product.add_excel', $data);
    }

    public function product_store_import(Request $request) 
    {

        $file = $request->file('file')->store('import');

        $import = new ProductImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }
        return redirect('admin/product')->with('success', 'Excel Import successfully.');

    }

    public function product_edit($id, Request $request){
        $data['getrecord'] = Product::get_single($id);
        $data['meta_title'] = 'Edit Product';
        return view('backend.product.edit', $data);
    }

    public function product_update(Request $request, $id){
        $user_update = Product::get_single($id);
        $user_update->sheet_no = $request->sheet_no;
        $user_update->product_date = $request->product_date;
        $user_update->location = $request->location;
        $user_update->sub_location = $request->sub_location;
        $user_update->asset = $request->asset;
        $user_update->qty = $request->qty;
        $user_update->save();
        return redirect('admin/product')->with('success', 'Product successfully update.');
    }


    public function delete_product_multi(Request $request){

        if(!empty($request->id))
        {
            $option = explode(',', $request->id);
            foreach($option as $id)
            {
                if(!empty($id))
                {
                    $getrecord = Product::find($id);
                    $getrecord->delete();

                    // $getrecord->is_delete = '1';
                    //$getrecord->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Option successfully deleted!');
    }

    public function product_destroy($id){
       $deleteRecord = Product::get_single($id);
        $deleteRecord->delete();

        return redirect()->back()->with('error', 'Product successfully deleted!');  
    }

    public function product_create(Request $request){
           $data['meta_title'] = 'Add Product';
       return view('backend.product.add', $data);
    }

    public function product_store(Request $request){
      $insert_r                   = new Product;
      $insert_r->user_id          = Auth::user()->id;
      $insert_r->sheet_no         = trim($request->sheet_no);
      $insert_r->product_date     = trim($request->product_date);
      $insert_r->location         = trim($request->location);
      $insert_r->sub_location     = trim($request->sub_location);
      $insert_r->asset            = trim($request->asset);
      $insert_r->qty              = trim($request->qty);
      $insert_r->save();
      return redirect('admin/product')->with('success', 'Product successfully insert.');
    }
}