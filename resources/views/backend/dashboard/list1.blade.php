@extends('backend.layouts.app')
  @section('style')
    <style type="text/css">
      
    </style>
  @endsection 
@section('content')

        <ul class="breadcrumb">
            <li><a href="">Dashboard</a></li>
            <li><a href="">Dashboard List</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Dashboard List</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">

                    {{-- start --}}
                  {{--   <div class="col-md-3">
                       <div class="widget widget-danger widget-padding-sm">
                            <div class="widget-big-int plugin-clock">00:00</div>                            
                            <div class="widget-subtitle plugin-date">Loading...</div>
                            <div class="widget-controls">                                
                                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                            </div>   
                            <div class="widget-buttons widget-c3">
                                <div class="col">
                                    <a href="#"><span class="fa fa-clock-os"></span></a>
                                </div>
                                <div class="col">
                                    <a href="{{ url('admin/dashboard') }}"><span class="fa fa-clock-o"></span></a>
                                </div>
                                <div class="col">
                                    <a href="#"><span class="fa fa-calendars"></span></a>
                                </div>
                            </div>                          
                                                       
                        </div>   
                    </div>  --}}
                    {{-- End --}}

<!-- START WIDGET REGISTRED -->
                     {{--  <div class="col-md-3">
                            
                            
                            <div class="widget widget-primary widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">375</div>
                                    <div class="widget-title">Registred users</div>
                                    <div class="widget-subtitle">On your website</div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                           
                            
                        </div> --}}
 <!-- END WIDGET REGISTRED -->

 <!-- START WIDGET REGISTRED -->
                    {{--   <div class="col-md-3">
                            
                            
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-shopping-cart"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">375</div>
                                    <div class="widget-title">Registred users</div>
                                    <div class="widget-subtitle">On your website</div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                           
                            
                        </div> --}}
 <!-- END WIDGET REGISTRED -->
  <!-- START WIDGET REGISTRED -->
                 {{--      <div class="col-md-3">
                            
                            
                            <div class="widget widget-default widget-item-icon" >
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">375</div>
                                    <div class="widget-title">Registred users</div>
                                    <div class="widget-subtitle">On your website</div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                           
                            
                        </div> --}}
 <!-- END WIDGET REGISTRED -->
                    {{-- End --}}
                    
                </div>
            </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title">Category Wise Audit Status of Physcial Qty VS Actual Qty</h3>
                      </div>
                 

              <div class="panel-body" style="overflow: auto;">
                  <table  class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Category ( A/B/C )</th>
                              <th>QTY</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>A</td>
                              <td>{{ $getProductCategoryA }}</td>
                              
                          </tr>
                           <tr>
                              <td>B</td>
                              <td>{{ $getProductCategoryB }}</td>
                              
                          </tr>
                          <tr>
                              <td>C</td>
                              <td>{{ $getProductCategoryC }}</td>
                              
                          </tr>

                          <tr>
                          <th colspan="1"> Grand total</th>
                              <td><b>{{ $getProductQTYTotal }}</b></td>
                              
                           </tr>
                       </tbody>
                  </table>
                  <div style="float: right">

                  </div>
              </div>
              </div>
             </div>
            </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title">Auditor Wise Audit Status of Physcial Qty VS Actual Qty</h3>
                      </div>
                 

              <div class="panel-body" style="overflow: auto;">
                  <table  class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Category ( A/B/C )</th>
                              <th>QTY</th>
                              <th>Physcial Inventory</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>A</td>
                              <td>{{ $getProductCategoryA }}</td>
                              <td>{{ $getProductQTYAvailableQtyA }}</td>
                          </tr>
                           <tr>
                              <td>B</td>
                              <td>{{ $getProductCategoryB }}</td>
                              <td>{{ $getProductQTYAvailableQtyB }}</td>
                          </tr>
                          <tr>
                              <td>C</td>
                              <td>{{ $getProductCategoryC }}</td>
                               <td>{{ $getProductQTYAvailableQtyC }}</td>
                          </tr>

                          <tr>
                          <th colspan="1"> Grand total</th>
                              <td><b>{{ $getProductQTYTotal }}</b></td>
                              <td><b>{{ $getProductQTYAvailableQtyTotal }}</b></td>
                           </tr>
                       </tbody>
                  </table>
                  <div style="float: right">

                  </div>
              </div>
              </div>
             </div>
            </div>
{{-- Next table --}}

                {{-- <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title">Auditor Wise Audit Status of Physcial Qty VS Actual Qty</h3>
                      </div>
                 

              <div class="panel-body" style="overflow: auto;">
                    <table  class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>#</th>  
                              <th>Auditor</th>
                              <th>Record Count</th>
                              <th>QTY</th>
                              <th>Physcial Inventory</th>
                          </tr>
                      </thead>
                      <tbody>
                         <?php $sum_user_id = 0 ?>
                         <?php $sum_tot_Qty = 0 ?>
                          @forelse($getGroupByUserID as $value) 
                          <tr>
                              <td>1</td>
                              <td>{{ $value->name }}</td>
                              <td>{{ $value->user_id_total }}</td>
                              <td>{{ $value->total_qty }}</td>
                              <td>121</td>
                          </tr>
                          <?php $sum_user_id += $value->user_id_total ?>
                          <?php $sum_tot_Qty += $value->total_qty ?>
                            @empty
                          <tr>
                              <td colspan="100%">Record not found.</td>

                          </tr>
                          @endforelse 

                          <tr>
                          <th colspan="2"> Grand total</th>
                              <td><b> {{ $sum_user_id}} <b></td>
                              <td> <b> {{ $sum_tot_Qty}} <b></td>
                              <td>11</td>
                           </tr>
                       </tbody>
                  </table>
                  <div style="float: right">

                  </div>
              </div>
              </div>
             </div>
            </div> --}}

        </div>
 
@endsection
  @section('script')
  <script type="text/javascript">
   
  </script>
@endsection
