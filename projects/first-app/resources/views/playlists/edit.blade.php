@extends('layouts.app')
@section('content')
    <h1>Edit Playlists</h1>
    <form action="{{ route('playlists.update' , $playlist->id) }}" method="POST">
        @csrf
        @method('PUT')

        <button type="submit">
            Edit Playlist
        </button>
        <br>
        
        @include('playlists._form')


    </form>
@endsection
