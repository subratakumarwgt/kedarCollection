<div class="modal fade" {{$attributes}}  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-{{$modal_size ?? 'lg'}}" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center p-2">
                {{$slot}}
                </div>           
            </div>            
        </div>
    </div>
</div>