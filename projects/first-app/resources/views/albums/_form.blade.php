<div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title' , $album->title ?? '') }}">
    @error('title')
        <p style="color: red">{{ $message }}</p>
    @enderror
</div>


<div>
    <label for="cover_image">Please Upload the Cover Image</label>
    <input type="file" name="cover_image" id="cover_image">
    @error('cover_image')
        <p style="color: red">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="release_date">Release Date</label>
    <input type="date" name="release_date" id="release_date" value="{{ old('release_date', isset($album->release_date) ? \Carbon\Carbon::parse($album->release_date)->format('Y-m-d') : '') }}">
    @error('release_date')
        <p style="color: red">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="artist_id">Select Artist</label>
    <select name="artist_id" id="artist_id">
        <option value="">-- Choose an Artist --</option>
        @foreach ($artists as $artist)
            <option
                value="{{ $artist->id }}"
                @selected(old('artist_id' , $album->artist_id ?? '') == $artist->id)
            >
                {{$artist->name}}
            </option>
        @endforeach
    </select>
    @error('artist_id')
        <p style="color: red">{{ $message }}</p>
    @enderror
</div>