<div class="row">
<div class="col{{$input->col ? '-'.$input->col : ''}}">
    <div class="mb-3">
        <label class="form-label" >{{$input->label}}</label>
        <select class="form-control btn-square " id="{{$input->id}}" name="{{$input->name}}">
            @foeach($options as $option)
            <option value="{{$option->value}}">{{$option->label}}</option>    
            @endforeach  
        </select>    
    </div>
</div>
</div>