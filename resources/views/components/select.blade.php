

@php
    $class = $errors->has($attributes->get('name')) ?
    "form-control is-invalid" :
    "form-control ";
@endphp

<select {{$attributes->merge(['class' => $class])}} >
    {{$slot}}
</select>


@error($attributes->get('name'))
    <span class="text-danger">{{$message}}</span>
@enderror
