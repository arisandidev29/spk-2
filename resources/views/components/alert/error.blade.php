@props([
    'message' => 'message here'
])

<div role="alert" {{$attributes->class("alert alert-success my-4 bg-red-500")}}>
    <span>{{$message}}</span>

</div>