<div>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $artist->name ?? '') }}" >
    @error('name')
        <span style="color:red">{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="bio">Bio</label>
    <textarea type="text" name="bio" id="bio">{{  old('bio', $artist->bio ?? '') }}</textarea>
    @error('bio')
            <span style="color:red">{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="image">Artist Image</label>
    <input type="file" name="image" id="image">
    @error('image')
            <span style="color:red">{{ $message }}</span>
    @enderror
</div>

