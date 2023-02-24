@props(['disabled' => false, 'value'])

@php
    $class = $errors->has($attributes->get('name')) ?
        "form-control is-invalid" :
        "form-control";
@endphp


<label {{$attributes->merge(['class' => 'fw-bolder my-2'])}} for=""> {{ucfirst($attributes->get('name')) ?? $slot}} </label>
<input type="text" {{$attributes->merge(['class' => $class])}} placeholder="@error($attributes->get('name')) {{$message}} @enderror">


