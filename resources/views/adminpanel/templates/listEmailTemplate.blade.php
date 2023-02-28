@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
<style>
.template_body{
 font-size: 12px !important;
 height: 270px;
 overflow: scroll;
}
</style>

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Product List  <i class="fas fa-cookie-bite"></i></h3>



@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Products</li>
<li class="breadcrumb-item active">List</li>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">    
        <div class="col-md-12 p-4">
            <h5>Email templates <div class="pull-right"><a href="{{route('email-template-add')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Add new template</a></div>
       </h5>
             </div>   
       @foreach($templates as $template)
       <div class="col-md-4 p-3">
        <div class="card border shadow">
        <div class="p-3 border-bottom ">
                <h6><small><strong class="text-primary">Template name: </strong></small><br> {{$template->name}}</h6>
            </div>
            <div class="p-3 border-bottom">
                <h6><small><strong class="text-primary">subject: </strong></small><br> {{$template->subject}}</h6>
            </div>
            <div class="p-3">
            <h6><small><strong class="text-primary">Message body: </strong></small></h6>
            </div>
            <div class="card-body p-3 text-dark template_body">
               
            {!! $template->body !!}
            </div>
            <div class="p-3 border-top">
                <div class="pull-right"> <a href="{{route('email-template-edit',['id'=>$template->id])}}" class="btn btn-sm btn-pill btn-success"><i class="fa fa-edit"></i></a></div>
            </div>
        </div>
       </div>
       @endforeach
    </div>
</div>
</div>
@endsection

@section('script')

<script>
    // $(function() {
    //     let selected_items = []
      
      
    //    $(".item_row").bind("change",getSelectedItems)
       
    //     var dataTable = $('#datatable').DataTable({
    //         'processing': true,
    //         serverSide: true,
    //         language: {
    //             processing: '<div class="loader-box"><div class="loader-2"></div></div>'
    //         },
    //         ajax: {
    //             'url': '/management/product/bind',
    //             'data': function(data) {
    //                 // Read values
    //                 var category = $('#category').val();
    //                 var sub_category = $('#sub_category').val();
    //                 var status = $('#status').val();

    //                 // Append to data
    //                 data.category = category;
    //                 data.sub_category = sub_category;
    //                 data.status = status;

    //             }
    //         },
    //         columns: [
    //             {
    //                 data: 'Select',
    //                 Orderable: false
    //             },{
    //                 data: 'Image',
    //                 Orderable: false
    //             },
    //             {
    //                 data: 'Title',
    //                 Orderable: false
    //             },
    //             {
    //                 data: 'MRP',
    //                 Orderable: false
    //             },                
    //             {
    //                 data: 'Brand',
    //                 Orderable: false
    //             },
    //             {
    //                 data: 'Stocks',
    //                 Orderable: false
    //             },
    //             {
    //                 data: 'Categories',
    //                 Orderable: false
    //             },
    //             {
    //                 data: 'Sub Categories',
    //                 Orderable: false
    //             },
    //             {
    //                 data: 'Search Tags',
    //                 Orderable: false
    //             },
    //             {
    //                 data: 'Action',
    //                 Orderable: false
    //             },
    //         ],
    //     });
    //     $('#category').on('change', function() {
    //         dataTable.draw();
    //     });
    //     $('#sub_category').on('change', function() {
    //         dataTable.draw();
    //     });
    //     $('#status').on('change', function() {
    //         dataTable.draw();
    //     });


    // });
</script>


<!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->
@endsection