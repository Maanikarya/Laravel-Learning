<div style="margin-bottom: 30px">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title' , $song->title ?? "") }}">
    @error('title')
        <p style="color:red">{{ $message }}</p>
    @enderror
</div>

<div>

<div style="margin-bottom: 30px">
    <label for="audio_path">Please upload the Song Audio</label>
    <input type="file" name="audio_path" id="audio_path">
    @error('audio_path')
        <p style="color:red">{{ $message }}</p>
    @enderror
</div>

<div style="margin-bottom: 30px">
    <label for="cover_image">Please Upload the Cover Image</label>
    <input type="file" name="cover_image" id="cover_image">
    @error('cover_image')
        <p style="color:red">{{ $message }}</p>
    @enderror
</div>

<div style="margin-bottom: 30px">
    <label for="artist_id">Please Select Artist</label>
    <select name="artist_id" id="artist_id">
        <option value="">--Select Artist--</option>
        @foreach ($artists as $id => $name)
            <option value="{{ $id }}"
                @selected( old('artist_id', $song->artist_id ?? "") == $id)
                >
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('artist_id')
        <p style="color:red">{{ $message }}</p>
    @enderror
</div>

<div style="margin-bottom: 30px">
    <label for="album_id">Please Select Album</label>
    <select name="album_id" id="album_id">
        <option value="">--Select Album</option>
        @foreach ($albums as $id => $title)
            <option value="{{ $id }}"
                @selected( old('album_id' , $song->album_id ?? "") == $id )
                >
                {{ $title }}
            </option>
        @endforeach
    </select>
    @error('album_id')
        <p style="color:red">{{ $message }}</p>
    @enderror
</div>

<div style="margin-bottom: 30px">
    <label for="genre_id">Please Select Genre</label>
    <select name="genre_id" id="genre_id">
        <option value="">--Select Genre--</option>
        @foreach ($genres as $id => $name)
            <option value="{{ $id }}"
                @selected( old('genre_id', $song->genre_id ?? "") == $id )
                >
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('genre_id')
        <p style="color:red">{{ $message }}</p>
    @enderror
</div>
