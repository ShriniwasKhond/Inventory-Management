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
                    <div class="col-md-3">
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
                    </div> 

                    {{-- End --}}
                    
                </div>
            </div>
        </div>
 
@endsection
  @section('script')
  <script type="text/javascript">
   
  </script>
@endsection
