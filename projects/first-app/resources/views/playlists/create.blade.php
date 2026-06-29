@extends('layouts.app')
@section('content')
    <h1>Create Playlists</h1>
    <form action="{{ route('playlists.store') }}" method="POST">
        @csrf
        
        <button type="submit">
            Create Playlist
        </button>
        <br>

        @include('playlists._form')
    </form>
@endsection
