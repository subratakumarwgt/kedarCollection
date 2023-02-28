@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link href="{{asset('assets/css/vendors/select2.css')}}" rel="stylesheet" />

@endsection

@section('breadcrumb-title')
<h3>Add Centre</h3>


@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Centre</li>
<li class="breadcrumb-item active">Add</li>
@endsection

@section('content')
<div class="card">
					
						<div class="card-body">
							<form  id="centre_form" class="needs-validation theme-form" novalidate="" enctype="multipart/form-data" method="post" action="/management/centre/import/data">
								<div class="mb-3 row">
								
									<div class="col-sm-3">
                                        <img src="/storage/centreimage/download.png" class="img-fluid shadow-sm border" id="img_prv">
										<input class="form-control" id="image" required type="file" accept="jpg,png" name="image" placeholder="Centre Image" >
                                       
									</div>
                                    <div class="col-md-9">
                                    <div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="">Title</label>
									<div class="col-sm-9">
										<input class="form-control" required id="name" type="text" placeholder="Centre Name" name="name">
                                        <div class="invalid-tooltip">Please enter valid title.</div>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="" required>Type</label>
									<div class="col-sm-9">
										<select id="type" class="form-control " name="type">
                                        <option  selected="" disabled="" >Choose centre type</option>
                                            <option value="clinic">Clinic/Chamber</option>
                                            <option value="diagnostic_centre">Diagnostic Centre</option>
                                        </select>
									</div>
								</div>
                                <div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="">Contact Number</label>
									<div class="col-sm-9">
										<input class="form-control" required id="number" type="text" placeholder="Contact" data-bs-original-title="" title="" name="details">
                                        <div class="invalid-tooltip">Please enter valid number.</div>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="">Address & PIN</label>
									<div class="col-sm-9">
										<input class="form-control" required id="address" type="text" placeholder="Addres with corresponding PIN" data-bs-original-title="" title="" name="address">
                                        <div class="invalid-tooltip">Please enter valid address.</div>
									</div>
								</div>
                                    </div>
								</div>
                            
							
                                <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="">Doctors</label>
                                <div class="col-sm-9">
                                <select class="form-control doctors" name="doctors[]" multiple="multiple" id="doctors">
                                    @foreach($d = \App\Models\Doctor::all() as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->name}}, {{$doctor->specialist}}</option>
                                    @endforeach
 
</select></div></div>
<div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="">Diagnoses</label>
                                <div class="col-sm-9">
                                <select class="form-control tests" name="diagnoses[]" multiple="multiple">
                                    @foreach($d = \App\Models\Diagnosis::all() as $tests)
                                    <option value="{{$tests->id}}">{{$tests->name}}, {{$tests->specialist}}</option>
                                    @endforeach
 
</select></div></div>
<button class="btn btn-primary ml-3 mt-2" data-bs-original-title="" title="" id="submit">Submit</button>
						
							</form>
						</div>
						<div class="card-footer">
						
							
						</div>
					</div>
                    
@endsection

@section('script')
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.doctors').select2();
    $('.tests').select2();

$("#submit").on("click",function(e){
    loadoverlay( $("#centre_form"))
    e.preventDefault();
    var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
              
                    if (form.checkValidity() === false) {
                        hideoverlay( $("#centre_form"))
                        form.classList.add('was-validated');
                    return 0;
                       
                    }
                    else{
                        var form = new FormData();
        var files = $('#image')[0].files;                
        if(files.length > 0 ){
form.append('image',files[0]);
form.append("table_name", "centres");
form.append("table_model", "Centre");
form.append("folder_name", "centreimage");
var settings = {
  "url": "/api/upload-image",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  statusCode: {
        400: function() {
            hideoverlay( $("#centre_form"))
         // response = JSON.parse(response);
      $.notify({
      message:"Please upload valid image file"
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
        },
        500: function(response) {
            hideoverlay( $("#centre_form"))
            response = JSON.parse(response);
      $.notify({
      message:"Something went wrong!"
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   })
      }
}
}


$.ajax(settings).done(function (response) {
    hideoverlay( $("#centre_form"))
    console.log(response);
    response = JSON.parse(response);
     console.log(response);
    $.notify({
      message:response.message
   },{
    type:'success',
    z_index:10000,
    timer:2000,
   });
   //$("#image").remove();
   $("#centre_form").append('<input type="hidden" name="image" value="'+response.data+'">');
   loadoverlay( $("#centre_form"))
   var form = new FormData();
form.append("table_name", "centres");
form.append("name", $("#name").val());
form.append("type", $("#type").val());
form.append("address",  $("#address").val());
form.append("details",  $("#number").val());
form.append("image", response.data);
form.append("table_model", "Centre");
form.append("doctors_list_json", JSON.stringify($("#doctors").val()));

var settings = {
  "url": "/api/create-data",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  statusCode: {
        400: function(response) {
            hideoverlay( $("#centre_form"))
          response = JSON.parse(response);
      $.notify({
      message:response.message
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
        },
        500: function(response) {
            hideoverlay( $("#centre_form"))
          response = JSON.parse(response);
      $.notify({
      message:response.message
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   })
      }
}
};

$.ajax(settings).done(function (response) {
    response = JSON.parse(response)
    $.notify({
      message:response.message
   },{
    type:'success',
    z_index:10000,
    timer:2000,
   });
  console.log(response);
});
 
 
});

        }else{
            hideoverlay( $("#centre_form"))
            $.notify({
      message:"Please select a file"
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
        }

                    }
                   
                
            });
    
  });

});
</script>
<script>

</script>

<!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->
@endsection