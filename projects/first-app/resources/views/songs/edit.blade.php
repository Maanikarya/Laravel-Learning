@extends('layouts.master')
@section('content')
    <h1> Edit Song </h1>
    <form action="{{ route('songs.update'  , $song->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('songs._form')

        <br>
        <button type="submit">
            Edit Song
        </button>
    </form>
@endsection
