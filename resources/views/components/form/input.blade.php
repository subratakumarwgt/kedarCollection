<div class="row">
    <div class="col{{$input->col ? '-'.$input->col : ''}}">
        <div class="mb-3 form-group">
            <label for="{{$input->id ? ''}}">{{$input->label}}</label>
            <input class="form-control" id="{{$input->id ? ''}}" type="{{$input->type ?? 'text'}}" placeholder="{{$input->place_holder ?? ''}}" name="{{$input->name}}" >
        </div>
    </div>
</div>