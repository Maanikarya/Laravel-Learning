<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Create</title>
</head>
<body>
    <h1> Create Artist </h1>
    
    <form action="{{ route('artists.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>Bio</label>
            <textarea type="text" name="bio" value="{{ old('bio') }}"></textarea>
        </div>

        <div>
            <label>Artist Image</label>
            <input type="file" name="image">
        </div>

        <br>

        <button type="submit">
            Save Artist
        </button>
    </form>
</body>
</html>