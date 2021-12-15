@extends('backend.layouts.app')

@section('style')
	<style type="text/css">
	
	</style>
@endsection

@section('content')

  <ul class="breadcrumb">
            <li><a href="">Product</a></li>
            <li><a href="">Product List</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Product List</h2>
        </div>
         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">

                    {{-- start --}}
                   @include('_message') 
                <a href="{{ url('admin/product/add') }}" class="btn btn-primary" title="Add New Product"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Product</span></a>  
                 <a href="{{ url('admin/product/import') }}" class="btn btn-primary" title="Import Excel"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Import Excel</span></a> 
                {{-- End --}}

                    {{-- Search Box Start --}}
            <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Product Search</h3>
                  </div>

                  <div class="panel-body" style="overflow: auto;">
                    <form action="" method="get">
                        <div class="col-md-2">
                           <label>ID</label>
                           <input type="text" value="{{ Request()->idsss }}" class="form-control" placeholder="ID" name="idsss">
                        </div>
                        <div class="col-md-3">
                           <label>Sheet No</label>
                           <input type="number" class="form-control" value="{{ Request()->sheet_no }}" placeholder="Sheet No" name="sheet_no">
                        </div>
                        <div class="col-md-2">
                           <label>Date</label>
                           <input type="date" class="form-control" value="{{ Request()->product_date }}" placeholder="Date" name="product_date">
                        </div>
                    
                       
                        <div class="col-md-3">
                           <label>Location</label>
                           <input type="text" class="form-control" value="{{ Request()->location }}" placeholder="Location" name="location">
                        </div>

                         <div class="col-md-2">
                           <label>Qty</label>
                           <input type="number" class="form-control" value="{{ Request()->qty }}" placeholder="Qty" name="qty">
                        </div>
                      
                        
                        <div style="clear: both;"></div>
                        <br>
                        <div class="col-md-12">
                           <input type="submit" class="btn btn-primary" value="Search">
                           <a href="{{ url('admin/product') }}" class="btn btn-success">Reset</a>
                        </div>
                     </form>
                  </div>
               </div>  

                    {{-- Search Box End --}}

                    {{-- Section Start --}}
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Product List</h3>
                      <a href="" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete?');" id="getDeleteURL" style="float: right;">Delete</a>
                  </div>
                 

              <div class="panel-body" style="overflow: auto;">
                  <table  class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                             <th>#</th>
                              <th>ID</th>
                             {{--  <th>Name</th> --}}
                              <th>Sheet No</th>
                              <th>Date</th>
                              <th>Location</th>
                              <th>Sub Location</th>
                              <th>Asset</th>
                              <th>Qty</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $sum_tot_Qty = 0 ?>
                    @forelse($getrecord as $value)
                          <tr>
                              <td>
                                  <input class="delete-all-option" value="{{ $value->id }}" type="checkbox" >
                                </td>
                              <td>{{ $value->id }}</td>
                             {{--  <td>{{ !empty($value->getUserName->name) ? $value->getUserName->name : '' }}</td> --}}
                              <td>{{ $value->sheet_no }}</td> 
                              <td>{{ date('d-m-yy', strtotime($value->product_date)) }}</td>
                              <td>{{ $value->location }}</td>
                              <td>{{ $value->sub_location }}</td>
                              <td>{{ $value->asset }}</td>
                              <td>{{ $value->qty }}</td>

                              <td>
                                
                                 <a href="{{ url('admin/product/edit/'.$value->id) }}" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a> 
                        
                            

     						           <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_record('{{ url('admin/product/delete/'.$value->id) }}');"><span class="fa fa-trash-o"></span></button> 
                   


                               <!-- MESSAGE BOX-->
     
                    <!-- END MESSAGE BOX-->    


                              </td>
                          </tr>
                          <?php $sum_tot_Qty += $value->qty ?>
                         @empty
                          <tr>
                              <td colspan="100%">Record not found.</td>

                          </tr>
                          @endforelse

                          <tr>
                          <th colspan="7"> Total Quantity</th>
                          <td>

                          {{ $sum_tot_Qty}}
                        </td>

                         </tr>
                      </tbody>

                  </table>
                 <div style="float: right">
                   
                    
                    {{ $getrecord->links() }} 
                
                  </div>
              </div>

              </div>
              {{-- Section End --}}
                    
                </div>
            </div>
        </div>


@endsection
  @section('script')
  <script type="text/javascript">
     $('.delete-all-option').change(function(){
        var total = '';
        $('.delete-all-option').each(function(){
            if(this.checked)
            {
                var id = $(this).val();
                total += id+',';
            }

        });

        var url = '{{ url('admin/product/delete_product_multi?id=') }}'+total;
        $('#getDeleteURL').attr('href',url);

        
    });
  </script>
@endsection
