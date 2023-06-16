@extends('layout')
@section('content')

@isset($announce)
    <h1> show page for : {{$announce->titre}} </h1>
@endisset

@endsection