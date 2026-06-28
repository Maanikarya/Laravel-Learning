@extends('layouts.app')
@section('content')
    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    <h1>Songs</h1>
    <h3>
        <a href="{{ route('songs.create') }}"> Create song</a>
    </h3>
    <table>
        <thead>
            <th>SNo.</th>
            <th>Title</th>
            <th>Duration</th>
            <th>Audio</th>
            <th>Cover Image</th>
            <th>Play Count</th>
            <th>Artist Name</th>
            <th>Album Name</th>
            <th>Genre</th>
            <th>Action</th>
        </thead>
        @foreach ( $songs as $song)
            <tr>
                <td> {{ $song->id }} </td>
                <td> {{ $song->title }} </td>
                <td> {{ $song->duration }} </td>
                <td>
                    <audio src="{{ $song->audio_path_url }}" controls></audio>
                </td>
                <td>
                    <img src="{{ $song->cover_image_url  }}" alt="{{  $song->title  }}">
                </td>
                <td> {{ $song->play_count }} </td>
                <td> {{ $song->artist->name }} </td>
                <td> {{ $song->album->title }} </td>
                <td> {{ $song->genre->name }} </td>
                <td>
                    <a href="{{ route('songs.show' , $song->id) }}">
                        View
                    </a>

                    <br>

                    <a href="{{ route('songs.edit' , $song->id) }}">
                        Edit
                    </a>

                    <br>

                    <form action="{{ route('songs.destroy' , $song->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Are you sure want to delete')">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
        <tr></tr>
    </table>
@endsection
