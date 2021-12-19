@extends('backend.layouts.app')
	
	@section('style')
	<style type="text/css">
		
	</style>
	@endsection
@section('content')

  <ul class="breadcrumb">
            <li><a href="">Product</a></li>
            <li><a href="">Add Product</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Add Product</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    {{-- Section Start --}}
                       <form class="form-horizontal" method="post" action="{{ url('admin/product/add') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Add Product</h3>
                                </div>
                                <div class="panel-body">
                                
                                 <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Tag Number <span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="sheet_no" value="{{ old('sheet_no') }}" placeholder="Tag Number" maxlength="50" type="number" required class="form-control" />
                                              <span style="color:red">{{  $errors->first('sheet_no') }}</span>
                                          </div>
                                      </div>
                                  </div>

                                    <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Date <span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="product_date" value="{{ old('product_date') }}" placeholder="Date" type="date" required class="form-control" />
                                              <span style="color:red">{{  $errors->first('product_date') }}</span>
                                          </div>
                                      </div>
                                  </div>
                                  
                       

                                <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Location <span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="location" value="{{ old('location') }}" placeholder="Location" maxlength="100" type="text" required class="form-control" />
                                              <span style="color:red">{{  $errors->first('location') }}</span>
                                          </div>
                                      </div>
                                  </div>

                                 <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Sub Location <span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="sub_location" value="{{ old('sub_location') }}" placeholder="Sub Location" maxlength="100" type="text" required class="form-control" />
                                              <span style="color:red">{{  $errors->first('sub_location') }}</span>
                                          </div>
                                      </div>
                                  </div>
                              

                                <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Asset <span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="asset" value="{{ old('asset') }}" placeholder="Asset" maxlength="250" type="text" required class="form-control" />
                                              <span style="color:red">{{  $errors->first('asset') }}</span>
                                          </div>
                                      </div>
                                  </div>

                                <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Qty <span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="qty" value="{{ old('qty') }}" placeholder="Qty" maxlength="50" type="number" required class="form-control" />
                                              <span style="color:red">{{  $errors->first('qty') }}</span>
                                          </div>
                                      </div>
                                  </div>

                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    {{-- Section End --}}
                </div>
            </div>
        </div>

@endsection
  @section('script')
  <script type="text/javascript">
   
  </script>
@endsection

