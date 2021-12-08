    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{url('/css/registration_form.css')}}">
        <title>Edit Song</title>
    </head>
    <body>
        @if(\Session::has('success'))
        <div class="alert">
            <h4>{{\Session::get('success') }}</h4>
        </div>  
        @endif
    <form action="/update_song_data/{{$user[0]->SongId}}" method="POST">
    @csrf
    <div class="container">
        <h1>Update</h1>
        <p>Please fill this form to edit song info.</p>
        <hr>

        <label for="artist"><b>Artist</b></label>
        <input type="text" placeholder="Enter artist" name="artist" id="artist" value="{{$user[0]->artist}}" required>

        <label for="song_title"><b>Song Title</b></label>
        <input type="text" placeholder="Enter song title" name="song_title" id="song_title" value="{{$user[0]->song_title}}" required>

        <label for="album"><b>Album</b></label>
        <input type="text" placeholder="Enter album" name="album" id="album" value="{{$user[0]->album}}" required>

        <label for="year"><b>Year</b></label>
        <input type="text" placeholder="Enter year" name="year" id="year" value="{{$user[0]->year}}" required>
        <hr>
        <button type="submit" class="registerbtn">Update song data</button>
    </div>

    </form>
    </body>
    </html>