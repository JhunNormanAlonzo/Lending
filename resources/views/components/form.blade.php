@props(['method' => 'GET'])

@php
    $spoofMethod = '';
    $method = strtoupper($method);
    if ($method == 'POST' || $method == 'PATCH' || $method == 'DELETE'){
        $spoofMethod = $method;
        $method = 'POST';
    }

@endphp

<div>
    <form {{'method='.$method}} {{$attributes}}>
        @csrf
        @method($spoofMethod)

        {{$slot}}
    </form>
</div>
