<div class="card-body">
    <form class="f1 crud_form" method="post" enctype="multipart/form-data" action="{{$action}}" id="{{$id}}">
        @csrf
        {{$slot}}
        <div class="row">
            <div class="form-control">
                <input type="submit" class="btn btn-outline-success" value="Submit" >
            </div>
        </div>
    </form>
</div>