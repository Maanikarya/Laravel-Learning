@extends('layouts.app')
@section('content')
    <h1>Edit Albums</h1>
    <form action="{{ route('albums.update' , $album->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('albums._form')

        <br>
        <button type="submit">
            Update Album
        </button>
    </form>
@endsection