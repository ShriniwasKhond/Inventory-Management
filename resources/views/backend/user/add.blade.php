@extends('backend.layouts.app')
	
	@section('style')
	<style type="text/css">
		
	</style>
	@endsection
@section('content')

  <ul class="breadcrumb">
            <li><a href="">User</a></li>
            <li><a href="">Add User</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Add User</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    {{-- Section Start --}}
                       <form class="form-horizontal" method="post" action="{{ url('admin/user/add') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Add User</h3>
                                </div>
                                <div class="panel-body">
                                
                                 <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Name <span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="name" value="{{ old('name') }}" placeholder="Name" maxlength="50" type="text" required class="form-control" />
                                              <span style="color:red">{{  $errors->first('name') }}</span>
                                          </div>
                                      </div>
                                  </div>

                                  
                                  <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Email ID<span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="email" value="{{ old('email') }}" required placeholder="Email ID" type="email" class="form-control" />
                                              <span style="color:red">{{  $errors->first('email') }}</span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                   <label class="col-md-3 col-xs-12 control-label">Password <span style="color:red"> *</span></label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="">
                                            <input name="password" value="" placeholder="Password" type="text" required class="form-control" />
                                            <span style="color:red">{{  $errors->first('password') }}</span>
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

