<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{url('/css/registration_form.css')}}">
        <title>Edit Group</title>
    </head>
    <body>
        @if(\Session::has('success'))
        <div class="alert">
            <h4>{{\Session::get('success') }}</h4>
        </div>  
        @endif
    <form action="/update_group_data/{{$user[0]->GId}}" method="POST">
    @csrf
    <div class="container">
        <h1>Update</h1>
        <p>Please fill this form to group info.</p>
        <hr>

        <label for="group_name"><b>Group Name</b></label>
        <input type="text" placeholder="Enter group name" name="group_name" id="group_name" value="{{$user[0]->group_name}}" required>

        <label for="fav_artist"><b>Favourite artist</b></label>
        <input type="text" placeholder="Enter favourite artist" name="fav_artist" id="fav_artist" value="{{$user[0]->fav_artist}}" required>

        <label for="description"><b>Description</b></label>
        <input type="text" placeholder="Enter description" name="description" id="description" value="{{$user[0]->description}}" required>

        <hr>
        <button type="submit" class="registerbtn">Update group data</button>
    </div>

    </form>
    </body>
    </html>