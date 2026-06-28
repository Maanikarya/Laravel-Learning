@extends('layouts.app')

@section('content')

    @if ( session('sucess') )
        <p>
            {{ session('sucess') }}
        </p>
    @endif
    <h1>Artists</h1>
    <a href="{{ route('artists.create') }}">Create Artists</a>
    <table>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Bio</th>
            <th>Action</th>
        </tr>
        @foreach ($artists as $artist)
            <tr>
                <td> {{ $artist->id }} </td>
                <td>{{ $artist->name }}</td>
                <td>{{ $artist->bio }}</td>
                <td>
                    <a href="{{ route('artists.edit' , $artist->id ) }}">
                        Edit
                    </a>
                    <br>
                    <a href="#">Delete</a>
                </td>
            </tr>
        @endforeach
        {{-- {{ $artists->links() }} --}}
    </table>


@endsection


