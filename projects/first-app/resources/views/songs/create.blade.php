@extends('layouts.app')
@section('content')
    <h1> Create Song </h1>
    <form action="{{ route('songs.store' ) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('songs._form')

        <br>
        <button type="submit">
            Create Song
        </button>
    </form>
@endsection
