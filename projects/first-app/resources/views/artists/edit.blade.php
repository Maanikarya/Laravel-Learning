@extends('layouts.app')

@section('content')

<h1>Edit Artist</h1>

<form action="{{ route('artists.update' , $artist->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        @include('artists._form')
        
        <button type="submit">
            Update Artist
        </button>
@endsection