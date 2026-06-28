@extends('layouts.app')
@section('content')

    <h1> Create Artist </h1>
    
    <form action="{{ route('artists.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" >
            @error('name')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Bio</label>
            <textarea type="text" name="bio">{{ old('bio') }}</textarea>
            @error('bio')
                 <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Artist Image</label>
            <input type="file" name="image">
            @error('image')
                 <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <br>

        <button type="submit">
            Save Artist
        </button>
    </form>

@endsection