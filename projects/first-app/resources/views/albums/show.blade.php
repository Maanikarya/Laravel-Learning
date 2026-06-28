@extends('layouts.app')
@section('content')
<h1>Album Details</h1>
<img src="{{ $album->cover_image_url }}" alt=" {{ $album->title }} " style="width: 150px; height: 150px; object-fit: cover;">
<h3>Title: {{ $album->title }}</h3>
<p>Release Date: {{ $album->release_date->format('d M Y') }}</p>
<p>Album Artist: {{ $album->artist->name }}</p>
@endsection