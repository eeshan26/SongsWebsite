<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <title>Songs</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/displaySongsData">Songs</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/displayFriendsData">Friends</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="/displayGroupsData">Groups</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
@if(\Session::has('success'))
        <div class="alert alert-success" role="alert">
            <h4>{{\Session::get('success') }}</h4>
        </div>
            <!-- <div class="alert">
                <h4>{{\Session::get('success') }}</h4>
            </div>   -->
@endif
<div class="container" >
        <div class="jumbotron">
            <br>
            <h1>Songs</h1>
            <hr>
            <div class="line" style="text-align:right;">
                <a href="/favouriteSongs" class="btn btn-primary">Favourite Songs</a>
            </div>
            <br>
            <form>
                <table id="song_data_table" class="table table-hover table-dark table-borderless">
                    <thead class="thead-dark">
                        <tr>
                            <th>Song Id</th>
                            <th>Artist</th>
                            <th>Title</th>
                            <th>Album</th>
                            <th>Year</th>
                            <th>UPDATE</th>
                            <th>Delete</th>
                            <th></th>
                            <th>Marks as Favourite</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $row)
                        <tr style= "background:white;">
                            <td>{{$row->SongId}}</td>
                            <td>{{$row->artist}}</td>
                            <td><a href="">{{$row->song_title}}</a></td>
                            <td>{{$row->album}}</td>
                            <td>{{$row->year}}</td>
                            <td>
                                <a href="/click_song_edit/{{$row->SongId}}" class="btn btn-outline-warning">Edit</a> 
                            </td>
                            <td>
                                <a href="/click_song_delete/{{$row->SongId}}" class="btn btn-outline-danger">Delete</a> 
                            </td>
                            <td>
                            <a href="/click_song_play/{{$row->SongId}}" class="btn btn-outline-info">Play</a>
                            </td>
                            <td>
                                <a href="/click_mark_favourite/{{$row->SongId}}" class="btn btn-outline-success"><i class="bi bi-heart" ></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#song_data_table').DataTable();
            } );
    </script>
</body>
</html>