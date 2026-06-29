@extends('layouts.master')

@section('content')

    @if ( session('sucess') )
        <p>
            {{ session('sucess') }}
        </p>
    @endif
    <h1>Artists</h1>
    <h3><a href="{{ route('artists.create') }}">Create Artists</a></h3>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Bio</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($artists as $artist)
            <tr>
                <td> {{ $artist->id }} </td>
                <td>{{ $artist->name }}</td>
                <td>{{ $artist->bio }}</td>
                <td>
                     <img src="{{ $artist->image_url }}" alt="{{$artist->name}}" style="width: 150px; height: 150px; object-fit: cover;">
                </td>
                <td>
                    <a href="{{ route('artists.show' , $artist->id ) }}">View</a>
                    <br>
                    <a href="{{ route('artists.edit' , $artist->id ) }}">
                        Edit
                    </a>
                    <br>
                    <form action="{{ route('artists.destroy' , $artist->id ) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Are you sure want to delete the artist')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        {{-- {{ $artists->links() }} --}}
    </table>


@endsection


