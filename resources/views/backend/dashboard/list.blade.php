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
                      <div class="col-md-5">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Category Wise Audit Status of Physcial Qty VS Actual Qty</h3>
                                       
                                    </div>                                    
                                
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Category ( A/B/C )</th>
                                                    <th width="20%">Count</th>
                                                    <th width="20%">QTY</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>A</strong></td>
                                                    <td>{{ $getProductCategoryCountA }}</td>
                                                    <td>{{ $getProductCategoryA }}</td>
                                                </tr>
                                                <tr>
                                                   <td><strong>B</strong></td>
                                                   <td>{{ $getProductCategoryCountB }}</td>
                                                   <td>{{ $getProductCategoryB }}</td>
                                                </tr>                                                
                                                <tr>
                                                   <td><strong>C</strong></td>
                                                    <td>{{ $getProductCategoryCountC }}</td>
                                                   <td>{{ $getProductCategoryC }}</td>
                                                </tr>
                                                <tr>
                                                      <th colspan="1"> Grand total</th>
                                                      <td><b>{{ $getProductCategoryCountTotal }}</b></td>
                                                      <td><b>{{ $getProductQTYTotal }}</b></td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                        <div class="col-md-7">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Auditor Wise Audit Status of Physcial Qty VS Actual Qty</h3>
                                        
                                    </div>                                    
                                
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Category ( A/B/C )</th>
                                                    <th width="20%">Count</th>
                                                    <th width="30%">Physcial QTY</th>
                                                    <th width="20%">Available QTY</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>A</strong></td>
                                                     <td>{{ $getProductQtyACount }}</td>
                                                   <td>{{ $getProductQtyA }}</td>
                                                     <td>{{ $getProductQTYAvailableQtyA }}</td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td><strong>B</strong></td>
                                                    <td>{{ $getProductQtyBCount }}</td>
                                                      <td>{{ $getProductQtyB }}</td>
                                                    <td>{{ $getProductQTYAvailableQtyB }}</td>
                                                     
                                                  
                                                </tr>                                                
                                                <tr>
                                                    <td><strong>C</strong></td>
                                                   <td>{{ $getProductQtyCCount }}</td>
                                                  <td>{{ $getProductQtyC }}</td>
                                                    <td>{{ $getProductQTYAvailableQtyC }}</td>
                                                        
                                                   
                                                </tr>
                                               
                                   <tr>
                                  <th colspan="1"> Grand total</th>
                                      <td><b>{{ $getProductQtyTotalCount }}</b></td>
                                     <td><b>{{ $getProductQTYAvailableQtyTotalSUM }}</b></td>
                                      <td><b>{{ $getProductQTYAvailableQtyTotal }}</b></td>
                                       
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
