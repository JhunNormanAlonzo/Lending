@props(['value'])

<label {{$attributes->merge(['class' => 'fw-bolder my-2'])}} for=""> {{$value ?? $slot}} </label>
