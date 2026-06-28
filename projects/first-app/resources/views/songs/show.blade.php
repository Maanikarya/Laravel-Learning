@extends('layouts.app')
@section('content')
    <h1>Song Details</h1>

    <h3> Song Title :{{ $song->title }} </h3>
    <p>
        <img src="{{ $song->cover_image_url  }}" alt="{{  $song->title  }}">
    </p>
    <p> Song Id : {{ $song->id }} </p>
    
    <p> Song Duration :{{ $song->duration }} </p>
    <p> Song Audio :{{ $song->audio_path }} </p>

    <p> Song Play Count : {{ $song->play_count }} </p>
    <p> Song Artist: {{ $song->artist->name }} </p>
    <p> Song Album: {{ $song->album->title }} </p>
    <p> song Genre: {{ $song->genre->name }} </p>
@endsection
