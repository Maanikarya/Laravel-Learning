<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Index</title>
</head>
<body>
    @if ( session('sucess') )
        <p>
            {{ session('sucess') }}
        </p>
    @endif
    <h1>Artists</h1>
    <a href="{{ route('artists.create') }}">Create Artists</a>
    <table>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Bio</th>
        </tr>
        @foreach ($artists as $artist)
            <tr>
                <td> {{ $artist->id }} </td>
                <td>{{ $artist->name }}</td>
                <td>{{ $artist->bio }}</td>
            </tr>
        @endforeach
        {{ $artists->links() }}
    </table>
</body>
</html>