<div style="margin-bottom: 30px">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name' , $playlist->name ?? '') }}">
    @error('name')
        <p style="color:red">{{ $message }}</p>
    @enderror
</div>

<div style="margin-bottom: 30px">
    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="{{ old('description' , $playlist->description ?? '') }}">
    @error('description')
        <p style="color:red">{{ $message }}</p>
    @enderror
</div>

<div style="margin-bottom: 30px">
    <label for="user_id">Select Users</label>
    
    <select name="user_id" id="user_id">
        
        <option value="">-- Select User --</option>
        @foreach ($users as $id => $userName)
            <option

            value="{{ $id }}"
            @selected( old('user_id' , $playlist->user_id ?? '') == $id)

            >{{ $userName }}</option>
        @endforeach
    </select>
    @error('user_id')
        <p style="color:red">{{ $message }}</p>
    @enderror
</div>

<div style="margin-bottom: 30px">

    <label for=""> Select songs </label>

    @error('songs')
        <p style="color:red">{{ $message }}</p>
    @enderror

    @foreach ($songs as $id => $songName)

        <br>

        <label for="">
            
            <input
            
            type="checkbox"
            name="songs[]"
            id="song_id"
            value="{{ $id }}"
            
            @checked(
                in_array(
                    $id ,
                    old(
                        'songs' ,
                        $playlist->songs->pluck('id')->toArray() 
                    )
                )
            )
            >

            {{ $songName }}
        
        </label>
    @endforeach
</div>
