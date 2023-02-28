@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')

@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">{{$parent ?? "Inventory"}}</li>
<li class="breadcrumb-item active">{{$child ?? "Resources"}} </li>
@endsection

@section('content')
<!-- Modals -->

<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-sm-8">
            <div class="card">
                <form action="" id="add_item_form" class="form" method="post" action="/management/update-resources/{{$item->id}}">
                    @csrf
                    <div class="card-body">

                        <div class="modal-header">
                            <h5> <i class="fa fa-plus-square"></i> Edit {{$child}}
                            </h5>
                        </div>
                        <div class="modal-body">

                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Item name
                                </label>
                                <input type="text" class="form-control" id="item_name" required name="name" value="{{$item->name}}">
                            </div>
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Unit
                                </label>
                                <input type="text" class="form-control" id="item_unit" required name="unit" value="{{$item->unit}}">
                            </div>

                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Type
                                </label>
                                <select name="type" id="type" class="form-control">
                                    @if($item->type == "product" )
                                    <option value="product" selected>Product</option>
                                    @else
                                    <option value="vegetable" @if($item->type == "vegetable") selected @endif>Vegetable</option>
                                    <option value="raw_material" @if($item->type == "raw_material") selected @endif>Raw Material</option>
                                    @endif
                                </select>
                            </div>
                            @if($item->type == "product" )
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Sub category
                                </label>
                                <select name="sub_category" id="sub_category" class="form-control">
                                    <option value="ice_cream" @if($item->type == "ice_cream") selected @endif>Ice Cream</option>
                                    <option value="fast_food" @if($item->type == "fast_food") selected @endif>Fast Food</option>
                                </select>
                            </div>
                            @endif
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Price
                                </label>
                                <input type="number" class="form-control" id="item_price" required name="price" value="{{$item->price}}">
                            </div>


                        </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-dark shadow-sm btn-block" type="submit"> Update <i class="fa fa-upload"></i> </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>



@endsection

@section('script')



<!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->
@endsection