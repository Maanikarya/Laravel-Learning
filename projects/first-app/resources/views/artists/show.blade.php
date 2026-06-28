@extends('layouts.app')
@section('content')
<h1>Artist Details</h1>
<img src="{{ $artist->image_url }}" alt="{{$artist->name}}" style="width: 150px; height: 150px; object-fit: cover;">
<h3>Name: {{ $artist->name }}</h3>
<p>Bio: {{ $artist->bio }}</p>
@endsection