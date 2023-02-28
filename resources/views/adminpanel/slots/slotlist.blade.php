@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3><i class="fas fa-list"></i> All Slots </h3> <button class="pull-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i></button>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Slots</li>
<li class="breadcrumb-item active">List</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <form class="row justify-content-center">
    <div class="col-md-4 mb-2">
            <label>Search by Centre</label>
            <select class="form-control shadow-sm" id="centres" multiple="multiple" >
            @foreach($centres as $centre)
                            <option value="{{$centre->id}}">{{$centre->name}}</option>
                            @endforeach
            </select>
        </div>
        <div class="col-md-4 mb-2">
            <label>Search by Doctor</label>
            <select class="form-control shadow-sm" id="doctors" name="doctor_id">
                <option value=""></option>
            </select>
        </div>
       
        <div class="col-md-2 mb-2 mt-4 p-2">
            <button class="btn btn-outline-primary btn-sm  shadow-sm">Search</button>
        </div>
        </form>
        <div class="col-md-4 mb-4">
            <label>From Date</label>
            <input class="form-control shadow-sm " type="date" value="{{date('Y-m-d')}}">
        </div>
        <div class="col-md-4 mb-4">
            <label>To Date</label>
            <input class="form-control shadow-sm" type="date" value="{{date('Y-m-d')}}">
        </div>
        <div class="col-md-2 mb-2 mt-4 p-2">
            <button class="btn btn-outline-primary btn-sm shadow-sm">Search</button>
        </div>
        @foreach($slots as $slot)
        <div class="col-md-11">
            <div class="bg-white shadow-sm mb-2 ">
                <div class="card-body border-primary border">
                    <div class="row">
                        <div class="col-sm-2 col-md-2 p-2 text-centre"><img src="/{{$slot->doctor->image}}" style="width: 180px;" class="img-fluid">
                            <p class="text-primary ">Dr {{strtoupper($slot->doctor->name)}}</p>
                        </div>

                        <div class=" col-md-4 p-2">

                            <p class="text-primary"><i class="fas fa-clinic-medical"></i> {{@$slot->centre->name}}</p>
                            <p class="text-primary"><i class="fas fa-map-marker-alt"></i> {{@$slot->centre->address}}</p>
                            <p class="text-primary"><i class="fas fa-clock"></i> {{@json_decode($slot->doctor->visits->others_json)->from_time}}-{{@json_decode($slot->doctor->visits->others_json)->to_time}}</p>

                        </div>
                        <div class=" col-md-3 p-2">
                            <p class="text-primary"><i class="fa fa-calendar" aria-hidden="true"></i> from: {{date("d M,Y")}}</p>
                            <p class="text-primary"><i class="fa fa-calendar" aria-hidden="true"></i> to: {{date("d M,Y")}}</p>
                        </div>
                        <div class="col-md-3 p-2">
                            <p class="text-primary"> Total Slots: {{$slot->slots}}</p>
                        
                        </div>
                    </div>
                </div>
                <div class="card-footer border-danger border">
                    <div class="table-responsive row justify-content-center d-none mb-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Free Slots
                                    </th>
                                    <th>
                                        Centre Name
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        To
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slot->doctor->slots as $slot_dates)
                                <form method="post" action="/operation/slot/update/{{$slot_dates->id}}">@csrf
                                    <tr>
                                        <td class="col-2">{{$slot_dates->date}} </td>
                                        <td><input class="form-control col-2" type="text" value="{{$slot_dates->free_slots}}" name="free_slots"> </td>
                                        <td class="col-2">{{$slot_dates->centre->name}} </td>
                                        <td><input class="form-control col-2" type="text" value="{{$slot_dates->from_time}}" name="from_time"> </td>
                                        <td ><input class="form-control col-2" type="text" value="{{$slot_dates->to_time}}" name="to_time"> </td>
                                        <td class="col-2"><button class="btn btn-sm btn-outline-primary text-dark shadow-sm" type="submit"> <i class="fa fa-refresh"></i></button><a class="btn btn-sm shadow-sm" href="/operation/slot/delete/{{$slot_dates->id}}" type="button"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                </form>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                   <button class="btn btn-outline-secondary  shadow-sm btn-sm view-hide"><i class="fa fa-eye" aria-hidden="true"></i> View/Hide</button>
                </div>
            </div>
        </div>
        @endforeach
        @if($slots->hasMorePages())
        <div class="col-md-12 pull-right"><a class="nav-link" href=" {{$doctors->nextPageUrl()}}">See More...</a></div>
        @endif

    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script>
    $(function() {
       // 
        $(".view-hide").on('click',function(){
            $(this).parent('div').find('div').toggleClass('d-none');
            $(this).parent('div').find('div').find('table').dataTable();
        })
        
        $("#from_date").datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
        $("#to_date").datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
        $("#from_date").on("change", () => {
            $("#to_date").datepicker("option", "minDate", new Date($(this).val()));
        })


        $("#create_slot").on("click", () => {
            loadoverlay($("#option_space"))
            var form = new FormData();



            form.append("doctor_id_list", JSON.stringify($("#doctors").val()));
            form.append("from_date", $("#from_date").val());
            form.append("to_date", $("#to_date").val());

            var settings = {
                "url": "/api/create-slots",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,

                statusCode: {
                    400: function() {
                        hideoverlay($("#option_space"))
                        // response = JSON.parse(response);
                        $.notify({
                            message: "Please upload valid data"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        });
                    },
                    500: function() {
                        hideoverlay($("#option_space"))
                        //	response = JSON.parse(response);
                        $.notify({
                            message: "Something went wrong!"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        })
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                hideoverlay($("#option_space"))
                var json_response = JSON.parse(response);
                // $.each(json_response.slot_data,(key,val)){}

                $.notify({
                    message: json_response.message
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                })
            })
        })
        $("#centres").select2();
        
        $("#centres").on('change', (e) => {
            $('#doctors').select2({
                tags: false,
                ajax: {
                    "url": "/api/centre-doctors/",
                    "method": "post",
                    delay: 600,
                    minimumResultsForSearch: -1,
                    data: function(params) {
                        var query = {
                            centres: JSON.stringify($("#centres").val())
                        }

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    },
                    processResults: function(response) {
                        response = JSON.parse(response);
                        return {
                            results: response.items
                        };

                    },

                },

            });

            $.each($("#doctors").children("option"), function() {
                this.prop("selected", "selected");
            })

        })

    });
</script>
@endsection