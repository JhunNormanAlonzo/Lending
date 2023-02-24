
@php
    $class = $errors->has($attributes->get('name')) ?
        "form-control is-invalid" :
        "form-control";
@endphp

<textarea  {{$attributes->merge(['class' => $class])}} rows="3">{{$slot}}</textarea>



@error($attributes->get('name')) <span class="text-danger">{{$message}}</span> @enderror
