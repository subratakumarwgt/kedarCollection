@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
<style>
  .select2-dropdown {
    z-index: 9001;
  }
</style>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">

@endsection

@section('breadcrumb-title')
<h3>Page List</h3>
<a href="register" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> New Page</a>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Page</li>
<li class="breadcrumb-item active">Page List</li>
@endsection

@section('content')


<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">

        <div class="card-body">
          <div class="row">

            <div class="col-md-6 p-3 border-right-sm">
              <label class="p-2">From</label>
              <input type="date" class="form-control shadow-sm mr-1 col-md-4" id="from_date" max="{{date('Y-m-d')}}" min="{{date('Y-m-d',strtotime('july 1,2021'))}}">
              <label class="p-2">To</label>
              <input type="date" class="form-control shadow-sm mr-1 col-md-4" id="to_date" max="{{date('Y-m-d')}}">

            </div>

            <div class="col-md-6 p-3">
              <label class="p-2">Filter by Type</label>
              <select class="form-control" id="status">
                <option value="" default>Choose your option</option>
                <option value="0">Inactive</option>
                <option value="1">Active</option>
              
              </select>


            </div>
          </div>



        </div>
        <div class="card-body">
          <div class="row mb-1 border-bottom-light">
            <div class="col-sm-2 p-1">
              <button class="btn btn-sm btn-outline-dark deleteButton"><i class="fa fa-trash"></i> Delete Selected</button>
            </div>
           
          </div>
          <div class="table-responsive">
            <table class="table" id="datatable">
              <thead>
                <tr>
                  <th>
                    <div class="text-center text-end icon-state switch-sm switch-outline m-1 ">
                      <label class="switch ">
                        <input type="checkbox" data-bs-original-title="" title="" id="select_all"><span class="switch-state  bg-success shadow-sm"></span>
                      </label>
                    </div>
                  </th>
                 
                  <th>Name</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>URL</th>
                  <th>Description</th>
                  <th>Created By</th>
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
  let selected_pages = []
  const getSelectedPages = () => {
    selected_pages = $(".page_row").filter(function() {
      return $(this).prop("checked")
    }).map(function() {
      return $(this).data("page_id")
    }).get()
    return selected_pages
  }



  $(".page_row").on("change", function() {
    selected_pages = $(".page_row").filter(function() {
      return $(this).prop("checked")
    }).map(function() {
      return $(this).data("page_id")
    }).get()
  })



  $("#select_all").on("change", function(e) {
    e.preventDefault()
    $(".page_row").prop("checked", $(this).prop("checked")).trigger("change")
    console.log("Selected Pages", getSelectedPages())
  })


  var dataTable = $('#datatable').DataTable({
    'processing': true,
    serverSide: true,
    language: {
      processing: '<div class="loader-box"><div class="loader-2"></div></div>'
    },
    ajax: {
      'url': '/management/page/bind',
      'data': function(data) {
        // Read values

        var toDate = $('#to_date').val();
        var fromDate = $('#from_date').val();
        var type = $('#type').val();

        // Append to data

        data.type = type;

        data.toDate = toDate;
        data.fromDate = fromDate;
      }
    },
    columns: [{
        data: "Select",
        orderable: false
      },
     
      {
        data: 'Name'
      },
      {
        data: 'Title'
      },
      {
        data: 'Slug',
        Orderable: false
      },
      {
        data: 'URL',
        Orderable: false
      },
      {
        data: 'Description',
        Orderable: false
      },
      {
        data: 'Created By',
        Orderable: false
      },
      {
        data: 'Action',
        Orderable: false
      },
    ],
  });



  $('#status').on('change', function() {
    dataTable.draw();
  });
  $('#to_date').on('change', function() {
    dataTable.draw();
  });
  $('#from_date').on('change', function() {
    dataTable.draw();
  });
  $("#from_date").prop('max', $("#to_date").val());
  $("#to_date").change(function() {
    $("#from_date").prop('max', $("#to_date").val());
  });
  $("#from_date").change(function() {
    $("#to_date").prop('min', $("#from_date").val());
  });
  $("#role_id_list").select2()
  const assign_modal = () => {
    $("#roleSetupModal").modal("show")
    // console.log(selected_pages)
    $("#page_list").val(getSelectedPages())
  }
</script>
<script>


</script>

<!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->
@endsection