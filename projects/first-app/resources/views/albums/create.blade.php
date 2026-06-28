@extends('layouts.app')
@section('content')

    <h1>Create New Album</h1>
    <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        @include('albums._form')

        <button type="submit">
            Create Album
        </button>
        
    </form>
@endsection
