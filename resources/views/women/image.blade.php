@extends('layouts.app')

@section('content')
    <p>imagePath: {{$imagePath}}</p>
    <p>url: {{$url}}</p>
    <img src="{{$url}}">
@endsection
