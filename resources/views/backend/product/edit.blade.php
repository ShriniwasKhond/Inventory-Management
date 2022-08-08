@extends('backend.layouts.app')
  @section('style')
    <style type="text/css">
      
    </style>
  @endsection 
@section('content')

        <ul class="breadcrumb">
            <li><a href="">Product</a></li>
            <li><a href="">Edit Product</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Product</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">

                  {{-- Section Start --}}
                      
                          <div class="panel panel-default">
                             <div class="panel-heading">
                                <h3 class="panel-title"> Edit Product</h3>
                             </div>

                             <form class="form-horizontal" method="post" action="{{ url('admin/product/edit/'.$getrecord->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}


                             <div class="panel-body">
                               
                               <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Tag Number <span style="color:red"> *</span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="sheet_no" maxlength="50" value="{{ $getrecord->sheet_no }}" placeholder="Tag Number" type="number" required class="form-control" />
                                         <span style="color:red">{{  $errors->first('sheet_no') }}</span>
                                      </div>
                                   </div>
                                </div>

                                {{--    <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Date <span style="color:red"> *</span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="product_date" value="{{ $getrecord->product_date }}" placeholder="Date" type="date" required class="form-control" />
                                         <span style="color:red">{{  $errors->first('product_date') }}</span>
                                      </div>
                                   </div>
                                </div> --}}

                              <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Location <span style="color:red"> </span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="location" maxlength="100" value="{{ $getrecord->location }}" placeholder="Location" type="text" class="form-control" />
                                         <span style="color:red">{{  $errors->first('location') }}</span>
                                      </div>
                                   </div>
                                </div>
                              
                                 <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Sub Location <span style="color:red"> </span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="sub_location" maxlength="100" value="{{ $getrecord->sub_location }}" placeholder="Sub Location" type="text" class="form-control" />
                                         <span style="color:red">{{  $errors->first('sub_location') }}</span>
                                      </div>
                                   </div>
                                </div>

                                    <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Item Code <span style="color:red"> </span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="item_code" value="{{ $getrecord->item_code }}" placeholder="Item Code" maxlength="100" type="text" class="form-control" />
                                              <span style="color:red">{{  $errors->first('item_code') }}</span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Asset<span style="color:red"> </span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="asset" maxlength="250" value="{{ $getrecord->asset }}" placeholder="Asset" type="text" class="form-control" />
                                         <span style="color:red">{{  $errors->first('asset') }}</span>
                                      </div>
                                   </div>
                                </div>


                                <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Main Category <span style="color:red"> </span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                             
                                            <select class="form-control" name="main_category">
                                              <option value="">Select Main Category</option>
                                              <option {{ ($getrecord->main_category == 'W')?'selected':'' }} value="W">Warehouse</option>
                                              <option {{ ($getrecord->main_category == 'S')?'selected':'' }} value="S">Store</option>
                                            </select>
                                              
                                              <span style="color:red">{{  $errors->first('main_category') }}</span>
                                          </div>
                                      </div>
                                  </div>

                                <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Sub Category <span style="color:red"> </span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                             
                                            <select class="form-control" name="category">
                                              <option value="">Select Sub Category</option>
                                              <option {{ ($getrecord->category == 'A')?'selected':'' }} value="A">A</option>
                                              <option {{ ($getrecord->category == 'B')?'selected':'' }} value="B">B</option>
                                              <option {{ ($getrecord->category == 'C')?'selected':'' }} value="C">C</option>
                                            </select>
                                              
                                              <span style="color:red">{{  $errors->first('category') }}</span>
                                          </div>
                                      </div>
                                  </div>

                                   <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Qty<span style="color:red"> *</span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="qty" maxlength="100" value="{{ $getrecord->qty }}" placeholder="Qty" type="number" required class="form-control" />
                                         <span style="color:red">{{  $errors->first('qty') }}</span>
                                      </div>
                                   </div>
                                </div>

                                   <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">UOM <span style="color:red"> </span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="uom" value="{{ $getrecord->uom }}" placeholder="UOM" maxlength="250" type="text" class="form-control" />
                                              <span style="color:red">{{  $errors->first('uom') }}</span>
                                          </div>
                                      </div>
                                  </div>
                            
                              </div>
                             <div class="panel-footer">
                                <button class="btn btn-primary pull-right">Update</button>
                             </div>

                            </form>

                          </div>
                      
                    {{-- Section End --}}


                </div>
            </div>
        </div>
 
@endsection
  @section('script')
  <script type="text/javascript">
   
  </script>
@endsection
