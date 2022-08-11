@extends('backend.layouts.app')

@section('style')
	<style type="text/css">
	
	</style>
@endsection

@section('content')

  <ul class="breadcrumb">
            <li><a href="">User</a></li>
            <li><a href="">User List</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> User List</h2>
        </div>
         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">

                    {{-- start --}}
                   @include('_message')
                <a href="{{ url('admin/user/add') }}" class="btn btn-primary" title="Add New User"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New User</span></a> 
                {{-- End --}}

                 <a href="{{ url('admin/user/myaccount') }}" class="btn btn-primary" title="Admin Password Change"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Admin Password Change</span></a> 

                    {{-- Search Box Start --}}
            <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">User Search</h3>
                  </div>

                  <div class="panel-body" style="overflow: auto;">
                    <form action="" method="get">
                        <div class="col-md-4">
                           <label>ID</label>
                           <input type="text" value="{{ Request()->idsss }}" class="form-control" placeholder="ID" name="idsss">
                        </div>
                        <div class="col-md-4">
                           <label>Name</label>
                           <input type="text" class="form-control" value="{{ Request()->name }}" placeholder="Name" name="name">
                        </div>
                    
                       
                        <div class="col-md-4">
                           <label>Email ID</label>
                           <input type="email" class="form-control" value="{{ Request()->email }}" placeholder="Email ID" name="email">
                        </div>
                      
                        
                        <div style="clear: both;"></div>
                        <br>
                        <div class="col-md-12">
                           <input type="submit" class="btn btn-primary" value="Search">
                           <a href="{{ url('admin/user') }}" class="btn btn-success">Reset</a>
                        </div>
                     </form>
                  </div>
               </div>  

                    {{-- Search Box End --}}

                    {{-- Section Start --}}
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">User List</h3>
                  </div>
                 

              <div class="panel-body" style="overflow: auto;">
                  <table  class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email ID</th>
                               <th>Password</th> 
                                <th>Block / Unblock</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                    @forelse($getrecord as $value)
                          <tr>
                              <td>{{ $value->id }}</td>
                              <td>{{ $value->name }}</td>
                              <td>{{ $value->email }}</td>                        
                              <td>{{ $value->password_show }}</td>                         
                              <td>
                                {{-- <a class="btn btn-primary btn-rounded btn-sm" id="viewUser" data-toggle="modal" data-target="#modal-id" data-id="{{ $value->password_show }}"><span class="fa fa-eye"></span></a> --}}

                                 

                                <?php if($value->is_deleted == '0'){ ?> 

                                    <a href="{{url('admin/user/status_delete',$value->id)}}" class="btn btn-success">Block</a>

                                <?php }else{ ?> 
                               
                                    <a href="{{url('admin/user/status_delete',$value->id)}}" class="btn btn-danger">  Unblock</a>
                               
                                <?php } ?>
                              </td>
                              <td>
                                <a href="{{ url('admin/user/edit/'.$value->id) }}" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a> 
                        
                              {{--   <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_record('{{ url('admin/user/delete/'.$value->id) }}');"><span class="fa fa-trash-o"></span></button>  --}}
                   
                              </td>
                          </tr>
                         @empty
                          <tr>
                              <td colspan="100%">Record not found.</td>

                          </tr>
                          @endforelse
                      </tbody>

                  </table>
                 <div style="float: right">
                   
                     {{--    {{ $getrecord->appends(Illuminate\Support\Facades\Input::except('page'))->links() }} --}}
                    {{ $getrecord->links() }} 
                
                  </div>
              </div>

              </div>
              {{-- Section End --}}
                    
                </div>
            </div>
        </div>


        <!-- Modal -->
<div class="modal fade" id="modal-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Password</h5>
        </div>
        <div class="modal-body">
        {{--   <h5>User Password</h5> --}}
          <h4 style="text-align: center;" class="pass"></h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



@endsection
  @section('script')
  <script type="text/javascript">
        $('body').on('click', '#viewUser', function(event) {
          event.preventDefault();
          var id = $(this).data('id');
          $('.modal-body').find('.pass').html(id);
       
      });

  </script>
@endsection
