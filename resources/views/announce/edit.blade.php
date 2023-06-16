@extends('layout')
@section('content')

@isset($announce)
    <h1> edit page for : {{$announce->titre}} </h1>
@endisset

@endsection