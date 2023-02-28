@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Offer List  <i class="fas fa-cookie-bite"></i></h3>



@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Offers</li>
<li class="breadcrumb-item active">List</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
       
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                <div class="col-md-12 mb-3"><div class="row"><div class="col-md-9 pull-left"><h4  class="bg-white text-primary p-3  rounded">@if(isset($offer))Update @else Add @endif Offer</h4></div>  <div class="col-md-3 pull-right"><a href="{{route('offer-import')}}" class="btn btn-primary btn-sm mr-3"><i class="fas fa-plus-square"></i> New Offer</a></div></div></div>
                    <div class="row m-0">
                        <div class="col-md-4 p-3 border-right-sm">
                            <label class="p-2">Offer Type</label>
                            <select name="" id="offer_type" class="offer_type m-1 form-control" >
                                    <option value="0"> Select offer type</option>
                                    @foreach($offer_type as $key => $type)
                                    <option value="{{$key+1}}">{{$type}}</option>
                                    @endforeach
                            </select>

                        </div>

                        <div class="col-md-4 p-3">
                            <label class="p-2">Date</label>
                           <input type="date" id="date" class="form-control">
                        </div>
                        <div class="col-md-4 p-3">
                            <label class="p-2">Filter by Status</label>
                            <select class="form-control" id="status">
                            <option  selected="" value="" disabled>--Select--</option>
                            <option value="1" >Pending</option>
                            <option  value="0" >Paused</option>
                            <option value="2" >Running</option>
                            <option value="3" >Finished</option>
                          
                            </select>
                            </select>


                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr><th>
                                        <div class="text-center text-end icon-state switch-sm switch-outline m-1 ">
                                        <label class="switch">
                                            <input type="checkbox" data-bs-original-title="" title="" id="select_all"><span class="switch-state  bg-success shadow-sm"></span>
                                        </label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Text</th>
                                    <th>Details</th>
                                    <th>Period</th>
                                    <th>Images</th>
                                    <th>Products</th>                                    
                                    <th>Revenue</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')

<script>
    $(function() {
        let selected_items = []
      
      
       $(".item_row").bind("change",getSelectedItems)
       
        var dataTable = $('#datatable').DataTable({
            'processing': true,
            serverSide: true,
            language: {
                processing: '<div class="loader-box"><div class="loader-2"></div></div>'
            },
            ajax: {
                'url': '/management/offer/bind',
                'data': function(data) {
                    // Read values
                    var category = $('#category').val();
                    var sub_category = $('#sub_category').val();
                    var status = $('#status').val();

                    // Append to data
                    data.category = category;
                    data.sub_category = sub_category;
                    data.status = status;

                }
            },
            columns: [
                {
                    data: 'Select',
                    Orderable: false
                },{
                    data: 'Name',
                    Orderable: false
                },
                {
                    data: 'Text',
                    Orderable: false
                },
                {
                    data: 'Details',
                    Orderable: false
                },                
                {
                    data: 'Period',
                    Orderable: false
                },
                {
                    data: 'Images',
                    Orderable: false
                },
                {
                    data: 'Products',
                    Orderable: false
                },
                {
                    data: 'Revenue',
                    Orderable: false
                },
                {
                    data: 'Action',
                    Orderable: false
                },
            ],
        });
        $('#offer_type').on('change', function() {
            dataTable.draw();
        });
        $('#created').on('change', function() {
            dataTable.draw();
        });
        $('#status').on('change', function() {
            dataTable.draw();
        });


    });
</script>


<!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->
@endsection