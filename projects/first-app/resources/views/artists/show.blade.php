@extends('layouts.app')
@section('content')
<h1>Artist Details</h1>
<h3>Name: {{ $artist->name }}</h3>
<p>Bio: {{ $artist->bio }}</p>
@endsection