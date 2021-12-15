@extends('backend.layouts.app')
	
	@section('style')
	<style type="text/css">
		
	</style>
	@endsection
@section('content')

  <ul class="breadcrumb">
            <li><a href="">Import Excel</a></li>
            <li><a href="">Add Import Excel</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Add Import Excel</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    {{-- Section Start --}}
                       <form class="form-horizontal" method="post" action="{{ url('admin/product/import') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Add Import Excel</h3>
                                </div>
                                <div class="panel-body">
                                

                                 <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Excel Upload<span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="file" placeholder="Excel Upload" type="file" required accept=".xlsx, .xls, .csv" class="form-control" />
                                              <span style="color:red">{{  $errors->first('file') }}</span>
                                          </div><br>
                                          
                                             <a href="{{ URL::to('public/excel/') }}/ivapp.xlsx" class="btn" target="_blank"><i class="fa fa-download"></i> Download Demo File</a>
                                  
                                      </div>
                                  
                                  </div>

                              

                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
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

