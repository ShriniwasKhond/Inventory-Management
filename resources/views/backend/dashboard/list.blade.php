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
                           <div class="col-md-7">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                       {{--  <h3>Category Wise Audit Status of Physcial Qty VS Actual Qty</h3> --}}
                                       
                                    </div>                                    
                                
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Category</th>
                                                    <th width="20%">Total Tags</th>
                                                    <th width="30%">Physcial Verified Tags</th>
                                                     <th width="30%">Audit Work Completed</th>

                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>A</strong></td>
                                                    <td>{{ $getProductCategoryCountA }}</td>
                                                     <td>{{ $getProductQtyACount }}</td>
                                                     <td>{{ $getProductQTYAvailableQtyA }}</td>
                                                </tr>
                                                <tr>
                                                   <td><strong>B</strong></td>
                                                   <td>{{ $getProductCategoryCountB }}</td>
                                                      <td>{{ $getProductQtyBCount }}</td>
                                                     <td>{{ $getProductQTYAvailableQtyB }}</td>
                                                </tr>                                                
                                                <tr>
                                                   <td><strong>C</strong></td>
                                                    <td>{{ $getProductCategoryCountC }}</td>
                                                     <td>{{ $getProductQtyCCount }}</td>
                                                     <td>{{ $getProductQTYAvailableQtyC }}</td>
                                                </tr>
                                                <tr>
                                                      <th colspan="1"> Grand total</th>
                                                      <td><b>{{ $getProductCategoryCountTotal }}</b></td>
                                                       <td><b>{{ $getProductQtyTotalCount }}</b></td>
                                                     <td><b>{{ $getProductQTYAvailableQtyTotal }}</b></td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>


                           <div class="col-md-5">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                      {{--   <h3>Auditor Wise Audit Status of Physcial Qty VS Actual Qty</h3> --}}
                                        
                                    </div>                                    
                                
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="10%">Category</th>
                                                    <th width="20%">Total Qty</th>
                                                    <th width="30%">Physcial Verified Qty</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>A</strong></td>
                                                       <td>{{ $getProductCategoryA }}</td>
                                                  
                                                    <td>{{ $getProductQtyA }}</td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td><strong>B</strong></td>
                                                    <td>{{ $getProductCategoryB }}</td>
                                                
                                                     <td>{{ $getProductQtyB }}</td>
                                                   
                                                     
                                                  
                                                </tr>                                                
                                                <tr>
                                                    <td><strong>C</strong></td>
                                                    <td>{{ $getProductCategoryC }}</td>
                                                   
                                                   <td>{{ $getProductQtyC }}</td>
                                                        
                                                   
                                                </tr>
                                               
                                               <tr>
                                              <th colspan="1"> Grand total</th>
                                                 <td><b>{{ $getProductQTYTotal }}</b></td>
                                              
                                                 
                                                      <td><b>{{ $getProductQTYAvailableQtyTotalSUM }}</b></td> 
                                               </tr>                                          
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>


                    </div>
  

        </div>
 
@endsection
  @section('script')
  <script type="text/javascript">
   
  </script>
@endsection
