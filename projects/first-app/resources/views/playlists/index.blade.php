@extends('layouts.app')
@section('content')
    
    @if (session('success'))
    <p>
        {{ session('success') }}
    </p>
    @endif

    <h1>Playlists</h1>
    <h2>
        <a href="{{route('playlists.create')}}">Create Playlist</a>
    </h2>

    <table>
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Songs</th>
            <th>User name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach ($playlists as $playlist)
            <tr>
                <td>{{ $playlist->id }}</td>
                <td>{{ $playlist->name }}</td>
                <td>
                    {{ $playlist->songs_count }} songs
                </td>
                <td>{{ $playlist->user->name }}</td>

                <td>{{ $playlist->description }}</td>

                <td>
                    <a href="{{ route('playlists.show' , $playlist->id) }}">View</a>
                    <br>
                    <a href="{{ route('playlists.edit' , $playlist->id) }}">Edit</a>

                    <form action="{{ route('playlists.destroy' , $playlist->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" style="display:inline" onclick="return confirm('are you sure')">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>

@endsection
