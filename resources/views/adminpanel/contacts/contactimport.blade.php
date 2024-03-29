@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Import Bulk Contacts</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">contacts</li>
<li class="breadcrumb-item active">import</li>
@endsection

@section('content')


<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style='display:none;'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New User Credentials</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                    <span aria-hidden="true">×</span>
                </a>
                <!-- <a href="#" class="btn btn-dark btn-sm" onclick="deleteUsers()">Delete Users</a> -->
            </div>
            <div class="modal-body">
                <table class="table" id="table2excel">
                    <thead>
                        <th> ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Region</th>
                        <th>Address</th>

                    </thead>
                    <tbody id="mBody"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary btn-sm" data-dismiss="modal" onclick="closeModal()">Close</a>
                <a href="#" class="btn btn-primary btn-sm" onclick="deleteNewUser()">Delete Users</a>
                <a href="#" class="btn btn-primary btn-sm" onclick="exportExcel()">Export</a>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
           
            <div class="card-body">
                <div class="row text-center justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                        <div class="input-group mb-3">
                            <span class="input-group-prepend"><span class="input-group-text"><i class="fa fa-list"></i></span></span>
                            <input type="file" class="form-control" placeholder="Upload Excel Sheet" id="excelfile" name="excelfile">
                            <button type="button" class="btn btn-primary " id="viewfile" onclick="ExportToTable()">Upload</button>
                        </div>
                        <span class="text-muted ">(*Upload Excel Sheet in Given format) (*Max Size 5MB)<br> <a href="/excel_files/yepmember_excel.xlsx" class="btn btn-rounded btn-light pull-right ml-3 " download="/storage/sample_excel.xlsx">Download Sample Format</a></span>


                    </div>



                </div>

            </div>

        </div>


        <div class="card" id="tableholder" style="display: none;">
            <div class="card-header">Member List Overview
                <button type="button" class="btn btn-rounded btn-success pull-right btn-sm ml-3" onclick="approve(this.id)" id="approver">Approve</button>
                <button type="button" class="btn btn-rounded btn-warning pull-right btn-sm ml-3  " onclick="exportReport()" id="exportreportx" style="display: none;">Export Report</button>
                <button type="button" class="btn btn-rounded btn-dark pull-right btn-sm ml-3 " onclick="openModal()" id="openmodal" style="display: none;">New User List</button>
            </div>
            <div class="card-body" id="savefile"></div>
            <div class="card-body" id="resultbar" style="display: none;">
                <div class="row p-3 text-center border-bottom">
                    <div class="text-success pull-left col-md-6">Success: <strong id="success"></strong>

                    </div>
                    <div class="text-danger pull-right col-md-6">Failed: <strong id="failed"></strong></div>
                </div>


            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="exceltable"></table>
            </div>
        </div>


    </div>

</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>
<script src="{{asset('assets/js/jquery.table2excel.js')}}"></script>

<script src="{{asset('assets/js/jquery.progressTimer.js')}}"></script>

<script type="text/javascript">
    function ExportToTable() {
        loadoverlay($("#tableholder"));
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;
        /*Checks whether the file is a valid excel file*/
        if (regex.test($("#excelfile").val().toLowerCase())) {
            var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/
            if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {
                xlsxflag = true;
            }
            /*Checks whether the browser supports HTML5*/
            if (typeof(FileReader) != "undefined") {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = e.target.result;
                    /*Converts the excel data in to object*/

                    if (xlsxflag) {
                        var workbook = XLSX.read(data, {
                            type: 'binary'
                        });
                    } else {
                        var workbook = XLS.read(data, {
                            type: 'binary'
                        });
                    }
                    // console.log(workbook.Strings);
                    /*Gets all the sheetnames of excel in to a variable*/
                    var sheet_name_list = workbook.SheetNames;

                    var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/
                    sheet_name_list.forEach(function(y) {
                        /*Iterate through all sheets*/
                        /*Convert the cell value to Json*/
                        if (xlsxflag) {
                            var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);
                        } else {
                            var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);
                        }
                        console.log(exceljson);
                        if (exceljson.length > 0 && cnt == 0) {
                            BindTable(exceljson, '#exceltable');
                            cnt++;
                        }
                    });
                    hideoverlay($("#tableholder"), function() {
                        $('#exceltable').show();
                    });

                }
                $("#tableholder").slideDown();
                if (xlsxflag) {
                    /*If excel file is .xlsx extension than creates a Array Buffer from excel*/
                    reader.readAsArrayBuffer($("#excelfile")[0].files[0]);
                } else {
                    reader.readAsBinaryString($("#excelfile")[0].files[0]);
                }
            } else {
                hideoverlay($("#exceltable"));
                alert("Sorry! Your browser does not support HTML5!");
            }
        } else {
            hideoverlay($("#exceltable"));
            alert("Please upload a valid Excel file!");
        }
    }

    function BindTable(jsondata, tableid) {
        /*Function used to convert the JSON array to Html Table*/
        var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/
        for (var i = 0; i < jsondata.length; i++) {
            var row$ = $('<tr id="tr_' + i + '" />');
            for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                var cellValue = jsondata[i][columns[colIndex]];
                // if (cellValue == 'null')
                //     cellValue = "";
                row$.append($('<td id="id_' + colIndex + '" />').html(cellValue));
            }
            $(tableid).append(row$);
        }
    }

    function BindTableHeader(jsondata, tableid) {
        /*Function used to get all column names from JSON and bind the html table header*/
        var columnSet = [];
        var headerTr$ = $('<tr/>');
        for (var i = 0; i < jsondata.length; i++) {
            var rowHash = jsondata[i];
            for (var key in rowHash) {

                if (rowHash.hasOwnProperty(key)) {
                    if ($.inArray(key, columnSet) == -1) {
                        /*Adding each unique column names to a variable array*/
                        console.log(key);
                        columnSet.push(key);
                        headerTr$.append($('<th/>').html($.trim(key)));
                    }
                }
            }
        }
        $(tableid).append(headerTr$);
        return columnSet;
    }

    function approve(object) {
        loadoverlay($("#tableholder"));
        loadoverlay($("#approver"));

        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;
        /*Checks whether the file is a valid excel file*/
        if (regex.test($("#excelfile").val().toLowerCase())) {
            var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/
            if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {
                xlsxflag = true;
            }
            /*Checks whether the browser supports HTML5*/
            if (typeof(FileReader) != "undefined") {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = e.target.result;
                    /*Converts the excel data in to object*/

                    if (xlsxflag) {
                        var workbook = XLSX.read(data, {
                            type: 'binary'
                        });
                    } else {
                        var workbook = XLS.read(data, {
                            type: 'binary'
                        });
                    }
  
                    var sheet_name_list = workbook.SheetNames;

                    var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/
                    sheet_name_list.forEach(function(y) {
                        /*Iterate through all sheets*/
                        /*Convert the cell value to Json*/
                        if (xlsxflag) {
                            var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);
                        } else {
                            var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);
                        }
                        var progress = $("#savefile").progressTimer({
                            timeLimit: exceljson.length * 2 + 1,
                            onFinish: function() {
                                hideoverlay($("#tableholder"));
                                hideoverlay($("#approver"));
                                $("#resultbar").slideDown();
                                $("#approver").html('Approved');
                                $("#approver").prop('disabled', true);
                            },
                            //bootstrap progress bar style in the warning phase

                            warningStyle: 'progress-bar-danger',
                            //bootstrap progress bar style at completion of timer

                            completeStyle: 'progress-bar-success',

                        });

                        if (exceljson.length != 0) {

                            var xhr = $.ajax({
                                url: "/management/contact/import/data",
                                type: 'post',
                                data: {
                                    'data': JSON.stringify(exceljson)
                                },
                                statusCode: {
                                    400: function() {
                                        $.notify({
                                            message: response.message
                                        }, {
                                            type: 'danger',
                                            z_index: 10000,
                                            timer: 2000,
                                        });
                                    },
                                    500: function(){
                                        alert("Sorry, something went wrong.");
                                    }
                                }

                            }).done(function(response) {
                                var successList = response.data.result.success;
                                $("#success").html(response.data.success);
                                $("#failed").html(response.data.failed);
                                $.each(response.data.result.failed, function(key, value) {
                                    $("#" + this.id).addClass('alert alert-danger');
                                    $("#" + this.id).after("<tr><td colspan='18' id='td_" + this.id + "' class='text-danger'>Error: " + JSON.stringify(this.error) + "</td></tr>");
                                });
                                $.each(response.data.result.success, function(key, value) {
                                    $("#" + this.id).addClass('alert alert-success');
                                    $("#" + this.id).after("<tr><td colspan='18' id='td_" + this.id + "' class='text-success'>New User Created Successfully</td></tr>");
                                    $("#mBody").append("<tr><td>" + this.new_id + "</td><td>" + this.name + "</td><td>" + this.contact + "</td><td>" + this.address + "</td><td>" + this.region + "</td></tr>");


                                });
                                if (response.data.success > 0) {
                                    window.userList = response.data.result.success;
                                    $("#openmodal").show();
                                    $('body').prepend('<div class="modal-backdrop fade show" id="backdrop"></div>');
                                    $("#backdrop").addClass("show");
                                    $("#exampleModal").show("slow");
                                }

                                $("#exportreportx").show();
                                progress.progressTimer('complete');
                                hideoverlay($("#tableholder"));
                                hideoverlay($("#approver"));
                                $("#resultbar").slideDown();
                                $("#approver").html('Approved');
                                $("#approver").prop('disabled', true);

                                console.log(response);
                            });
                        }



                    });

                    // $('#exceltable').show();
                }
                if (xlsxflag) {
                    /*If excel file is .xlsx extension than creates a Array Buffer from excel*/
                    reader.readAsArrayBuffer($("#excelfile")[0].files[0]);
                } else {
                    reader.readAsBinaryString($("#excelfile")[0].files[0]);
                }
            } else {
                alert("Sorry! Your browser does not support HTML5!");
                hideoverlay($("#tableholder"));
            }
        } else {
            alert("Please upload a valid Excel file!");
            hideoverlay($("#tableholder"));
        }

    }

    function exportExcel() {
        $("#table2excel").table2excel({

            exclude: ".table",

            name: "User Credentials",

            filename: "New User List",

            fileext: ".xlsx",

            preserveColors: true

        });
    }

    function exportReport() {
        $("#exceltable").table2excel({

            exclude: ".table",

            name: "Import Report",

            filename: "Import Report",

            fileext: ".xlsx",

            preserveColors: true

        });
    }

    function closeModal() {       
        $("#exampleModal").modal("hide");
    }

    function openModal() {
       $("#exampleModal").modal("hide");
    }

    function deleteNewUser(id = null) {
        if (id == null) {
            loadoverlay($("#exampleModal"));
            $.ajax({
                url: "/delete-user",
                type: 'get',
                data: {
                    'data': JSON.stringify(window.userList)
                },

            }).done(function(response) {

                if (response.status == 'success') {
                    hideoverlay($("#exampleModal"));
                    closeModal();
                    $("#head_alert").addClass("text-center alert alert-info");
                    $("#head_alert").html("Deleted Successfully");
                    $("#exceltable").remove();

                } else {
                    hideoverlay($("#exampleModal"));
                }
            });
        }
    }
</script>
@endsection