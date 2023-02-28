@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Add New User <i class="fas fa-user"></i></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">Edit User</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-6 xl-100">
            <div class="card">
              
                <div class="card-body">
                    <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="profile-icon-tab" data-bs-toggle="tab" href="#profile-icon" role="tab" aria-controls="profile-icon" aria-selected="true"><i class="icofont icofont-man-in-glasses"></i>Profile</a></li>
                        <li class="nav-item"><a class="nav-link" id="contact-icon-tab" data-bs-toggle="tab" href="#contact-icon" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Passwords</a></li>
                    </ul>
                    <div class="tab-content" id="icon-tabContent">
                        <div class="tab-pane fade show active" id="profile-icon" role="tabpanel" aria-labelledby="profile-icon-tab">
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3 mt-3  shadow">
                                            <img src="/storage/{{$user->profile->image?? 'profileimage/default.png'}}" class="img-fluid " id="img_prv">
                                        </div>
                                    </div>
                                    <div class="col-md-9">

                                        <div class="row mt-5">
                                            <h6 class="">Account Info: </h6>
                                            <form id="user_account_form" class="row">
                                                <input type="hidden" value="{{$user->id}}" id="user_new_id">
                                                <div class="col-md-12 ">
                                                    <div class="mb-3">
                                                        <label class="form-label">Full Name</label>
                                                        <input class="form-control" type="text" placeholder="Full Name" data-bs-original-title="" id="name" required value="{{$user->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input class="form-control " type="email" placeholder="Email" data-bs-original-title="" id="email" minlength="5" value="{{@$user->email}}" @if(!empty($user->email)) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                    <label class="form-label">Contact Number</label>
                                                    <div class="input-group mb-3">

                                                        <div class="input-group-prepend"><span class="input-group-text">+91</span></div>
                                                        <input class="form-control" type="text" minlength="10" max="9999999999" placeholder="Contact number" data-bs-original-title="" title="" id="contact" value="{{@$user->contact}}" required readonly>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                    </div>

                                    <h6>
                                        <div class="form-check checkbox checkbox-success mb-0">
                                            <input class="form-check-input" id="includeProfile" type="checkbox" data-bs-original-title="" title="" {{$profile_checked}} @if(!empty($profile_checked)) disabled @endif>
                                            <label class="form-check-label" for="includeProfile">Profile Info: </label>
                                        </div>
                                    </h6>
                                    <form class="row" id="user_profile_form">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Profile Image <small>*(jpg and png)</small></label>
                                                <input class="form-control" type="file" placeholder="image" data-bs-original-title="" title="" id="image">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Age (in years)</label>
                                                <input class="form-control" type="number" placeholder="Age (in years)" data-bs-original-title="" title="" id="age" value="{{@$user->profile->age}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Date Of Birth</label>
                                                <input class="form-control" type="date" placeholder="Date Of Birth" data-bs-original-title="" title="" id="dob"  value="{{@$user->profile->dob}}">
                                            </div>
                                        </div>
                                    </form>
                                    <form class="row" id="user_address_form">
                                        <h6>
                                            <div class="form-check checkbox checkbox-success mb-0">
                                                <input class="form-check-input" id="includeAddress" type="checkbox" data-bs-original-title="" title="" {{$address_checked}} @if(!empty($address_checked)) disabled @endif>
                                                <label class="form-check-label" for="includeAddress">Address Info: </label>
                                            </div>
                                        </h6>
                                        <div class="col-sm-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Address line 1 <small>*(required)</small></label>
                                                <input class="form-control" type="text" placeholder="Address line 1" data-bs-original-title="" title="" required id="address_line_1" required  value="{{@$user->address->address_line_1}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-7">
                                            <div class="mb-3">
                                                <label class="form-label">Address line 2 </label>
                                                <input class="form-control" type="text" placeholder="Address line 2" data-bs-original-title="" title="" id="address_line_2" value="{{@$user->address->address_line_2}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <div class="mb-3">
                                                <label class="form-label">Landmark </label>
                                                <input class="form-control" type="text" placeholder="Address Landmark " data-bs-original-title="" title="" id="landmark" value="{{@$user->address->landmark}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">State </label>
                                                <select class="form-control" id="state">
                                            <option value="{{@$user->address->state}}">{{@$user->address->state}}</option>        
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">District </label>
                                                <select class="form-control" id="district">
                                                <option value="{{@$user->address->district}}">{{@$user->address->district}}</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">PIN </label>
                                                <input class="form-control" type="number" minlength="6" placeholder="Address PIN " data-bs-original-title="" title="" required id="zip_code" value="{{@$user->address->zip_code}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-12 p-5">
                                            <div class="mb-3">

                                                <input class="form-control btn btn-success" type="submit" minlength="6" placeholder="Address line 2" data-bs-original-title="" title="" required id="submit" value="Submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-icon" role="tabpanel" aria-labelledby="contact-icon-tab">
                            <div class="card-body">
                                <div class="row">
                                    <form id="user_password_form" class="row">

                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Password<small>(Minimum 6 digits)</small></label>
                                            <input class="form-control" type="password" placeholder="Password" data-bs-original-title="" id="password" required minlength="6">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password<small>(Same as password)</small></label>
                                            <input class="form-control" type="password" placeholder="Confirm Password" data-bs-original-title="" id="password_confirmation" required equalTo="#password" minlength="6">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-12 p-5">
                                        <div class="mb-3">

                                            <input class="form-control btn btn-success" type="submit" minlength="6" data-bs-original-title="" title="" required id="password_submit" value="Submit">
                                        </div>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">



            </div>

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
     $("#password_submit").on('click', function(e) {
        e.preventDefault();
        var password_valid = true;
        if ($("#password").valid() == false || $("#password_confirmation").valid() === false) {
            password_valid = false;

        }

        if (password_valid) {
            loadoverlay($("#user_password_form"));
            var form = new FormData();
            form.append("password", $("#password").val());
            form.append("password_confirmation", $("#password_confirmation").val());
            form.append("id", $("#user_new_id").val());
            form.append("contact", $("#contact").val());

            var settings = {
            "url": "/api/change-password",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
                statusCode: {
                    400: function(response) {
                        response = JSON.parse(response.responseText)

                        // alert();
                        hideoverlay($("#user_password_form"))
                      
                        $.notify({
                            message: response.message
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        });
                        $.each(response.errors, (key, value) => {

                            $("#" + key).addClass("is-invalid");
                            $("#" + key).after("<span class='error'>" + JSON.stringify(value) + "</span>");
                        })
                    },
                    500: function() {
                        hideoverlay($("#user_password_form"))
                       
                        $.notify({
                            message: "Something went wrong while inserting doctor!"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        })
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var response2 = JSON.parse(response)
             
        
                hideoverlay($("#user_password_form"))
                $.notify({
                    message: response2.message
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                })



            }, function() {
                window.open("/management/user/edit/"+$("#user_new_id").val(), "_self");
            });
        }
     });
</script>
<script>
    $("#submit").on('click', function(e) {
        e.preventDefault();
        var account_valid = true;
        var profile_valid = true;
        var address_valid = true;

        if ($("#includeProfile").prop("checked")) {
            if ($("#user_profile_form").valid() == false) {
                profile_valid = false;

            }
        }
        if ($("#includeAddress").prop("checked")) {
            if ($("#user_address_form").valid() == false || $("#zip_code").valid() === false) {
                address_valid = false;
            }

        }
        if ($("#user_account_form").valid() == false || $("#contact").valid() == false) {
            account_valid = false;

        }
        //$("#password").valid() == false || $("#password_confirmation").valid() === false ||
        if (account_valid == true && profile_valid == true && address_valid == true) {
            loadoverlay($("#user_account_form"));
            loadoverlay($("#user_profile_form"));
            loadoverlay($("#user_address_form"));

            var form = new FormData();
            var files = $('#image')[0].files;
            form.append("name", $("#name").val());
            form.append("image", files[0]);
            form.append("email", $("#email").val());
            form.append("id", $("#user_new_id").val());
            // form.append("password", $("#password").val());
            // form.append("password_confirmation", $("#password_confirmation").val());
            form.append("age", $("#age").val());
            form.append("dob", $("#dob").val());
            form.append("address_line_1", $("#address_line_1").val());
            form.append("address_line_2", $("#address_line_2").val());
            form.append("state", $("#state").val());
            form.append("district", $("#district").val());
            form.append("zip_code", $("#zip_code").val());
            form.append("landmark", $("#landmark").val());
            form.append("includeProfile", $("#includeProfile").prop("checked"));
            form.append("includeAddress", $("#includeAddress").prop("checked"));
            form.append("landmark", $("#landmark").val());
          
            var settings = {
                "url": "/api/update-user",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
                statusCode: {
                    400: function(response) {
                        response = JSON.parse(response.responseText)

                        // alert();
                        hideoverlay($("#user_account_form"))
                        hideoverlay($("#user_profile_form"))
                        hideoverlay($("#user_address_form"))
                        $.notify({
                            message: response.message
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        });
                        $.each(response.errors, (key, value) => {

                            $("#" + key).addClass("is-invalid");
                            $("#" + key).after("<span class='error'>" + JSON.stringify(value) + "</span>");
                        })
                    },
                    500: function() {
                        hideoverlay($("#user_account_form"))
                        hideoverlay($("#user_profile_form"))
                        hideoverlay($("#user_address_form"))
                        $.notify({
                            message: "Something went wrong while inserting doctor!"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        })
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var response2 = JSON.parse(response)
                if (response.status == false) {

                }
                hideoverlay($("#user_account_form"))
                hideoverlay($("#user_profile_form"))
                hideoverlay($("#user_address_form"))
                $.notify({
                    message: response2.message
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                })



            }, function() {
                window.open("/management/user/edit/"+$("#user_new_id").val(), "_self");
            });




        }
        //	
        else {
            alert("please check the form again")
        }
    })
</script>
<script>
    function customMatcher(params, data) {
        if ($.trim(params.term) === '') {
            return data;
        }

        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
            return null;
        }

        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        if (data.text.indexOf(params.term) > -1) {
            var modifiedData = $.extend({}, data, true);
            modifiedData.text += ' (matched)';

            // You can return modified objects from here
            // This includes matching the `children` how you want in nested data sets
            return modifiedData;
        }

        // Return `null` if the term should not be displayed
        return null;
    }
    $('#state').select2({
        tags: false,
        ajax: {
            url: "/api/get-states/",
            delay: 600,
            minimumResultsForSearch: -1,

            processResults: function(response) {

                response = JSON.parse(response);

                return {
                    results: response.items
                };

            },
            sortResults: data => data.sort((a, b) => a.text.localeCompare(b.text))


        }
    });
    if ($("#state").val() != "") {
        $('#district').select2({
            tags: false,
            ajax: {
                "url": "/api/get-districts/" + $("#state").val(),
                delay: 600,
                minimumResultsForSearch: -1,
                processResults: function(response) {
                    response = JSON.parse(response);
                    return {
                        results: response.items
                    };

                },

            },

        });
    }
  
</script>
<script>

</script>
@endsection