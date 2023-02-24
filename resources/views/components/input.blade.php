@props(['disabled' => false, 'type' => 'text'])

@php
    $class = $errors->has($attributes->get('name')) ?
        "form-control is-invalid" :
        "form-control";

    $name = $attributes->get('name');


@endphp


<input type="{{$type}}" {{$attributes->merge(['class' => $class])}} value="{{old($name) ?? $slot}}">
@error($attributes->get('name')) <span class="text-danger">{{$message}}</span> @enderror

