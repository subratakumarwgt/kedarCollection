@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Doctor List</h3> <a href="import" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> New Doctor</a>


@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Doctors</li>
<li class="breadcrumb-item active">List</li>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 p-3 border-right-sm">
                            <label class="p-2">Filter by Gender</label>
                            <select class="form-control" id="gender">
                                <option value="" default>Choose your option</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>

                        </div>

                        <div class="col-md-4 p-3">
                            <label class="p-2">Filter by Chambers</label>
                            <select class="form-control" id="chambers">
                            <option  selected="" value="" disabled>--Select--</option>
                            @foreach($centres as $centre)
                                <option value="{{$centre->id}}">{{$centre->name}},{{$centre->type}}</option>
                             @endforeach   
                            </select>
                            </select>


                        </div>
                        <div class="col-md-4 p-3">
                            <label class="p-2">Filter by Frequency</label>
                            <select class="form-control" id="chambers">
                            <option  selected="" value="" disabled>--Select--</option>
                            <option value="monthly">Monthly</option>
                            <option value="weekly">Weekly</option>
                            <option value="daily">Daily</option>
                           
                            </select>
                            </select>


                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr><th>Image</th>
                                    <th>Name</th>
                                    <th>Specialist</th>
                                    <th>Degrees</th>
                                    <th>Visit Frequency</th>
                                    <th>Chambers</th>
                                    <th>Experience</th>
                                    <th>Fees Structure</th>
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
       
        var dataTable = $('#datatable').DataTable({
            'processing': true,
            serverSide: true,
            language: {
                processing: '<div class="loader-box"><div class="loader-2"></div></div>'
            },
            ajax: {
                'url': '/management/doctor/bind',
                'data': function(data) {
                    // Read values
                    var gender = $('#gender').val();
                    var chamber = $('#chambers').val();

                    // Append to data
                    data.gender = gender;
                    data.chamber = chamber;

                }
            },
            columns: [{
                    data: 'Image',
                    Orderable: false
                },
                {
                    data: 'Name',
                    Orderable: false
                },
                {
                    data: 'Specialist',
                    Orderable: false
                },                
                {
                    data: 'Degrees',
                    Orderable: false
                },
                {
                    data: 'Visit Frequency',
                    Orderable: false
                },
                {
                    data: 'Chambers',
                    Orderable: false
                },
                {
                    data: 'Experience',
                    Orderable: false
                },
                {
                    data: 'Fees Structure',
                    Orderable: false
                },
                {
                    data: 'Action',
                    Orderable: false
                },
            ],
        });



        $('#chambers').on('change', function() {
            dataTable.draw();
        });
        $('#gender').on('change', function() {
            dataTable.draw();
        });


    });
</script>


<!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->
@endsection