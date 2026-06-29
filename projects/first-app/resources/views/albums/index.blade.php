@extends('layouts.master')
@section('content')

@if (session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
@endif
<h1>Albums</h1>
<h3><a href="{{ route('albums.create') }}">Create Album</a></h3>

<table>
    <tr>
        <th>Sno</th>
        <th>Title</th>
        <th>Cover Image</th>
        <th>Release Date</th>
        <th>Artist Name</th>
        <th>Action</th>
    </tr>
    @foreach ($albums as $album)
        <tr>
            <td>{{ $album->id }}</td>
            <td>{{ $album->title }}</td>
            <td>
                <img src="{{ $album->cover_image_url }}" alt=" {{ $album->title }} " style="width: 150px; height: 150px; object-fit: cover;">
            </td>
            <td>{{ $album->release_date->format('d M Y') }}</td>
            <td>{{ $album->artist->name }}</td>
            <td>
                <a href="{{ route('albums.show' , $album->id ) }}">View</a>
                <br>
                <a href="{{ route('albums.edit' , $album->id ) }}">Edit</a>
                <br>
                <form action="{{  route('albums.destroy' , $album->id ) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure want to delete album.')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
