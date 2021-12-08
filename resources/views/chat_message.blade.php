<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <title>Chat</title>
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
            <h1>Chat</h1>
            <hr>
            <div class="line" style="text-align:right;">
                <a href="/write_message" class="btn btn-primary">Write a message</a>
            </div>
            <br>
            <form>
                <table id="chat_table" class="table table-hover table-dark table-borderless">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sender name</th>
                            <th>Message</th>
                            <th>Timestamp</th>
                            <th>Delete message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $row)
                        <tr style= "background:white;">
                            <td>{{$row->name}}</td>
                            <td>{{$row->body}}</td>
                            <td><a href="">{{$row->date_time}}</a></td>
                            <td>
                                <a href="/click_message_delete/{{$row->date_time}}" class="btn btn-outline-danger">Delete</a> 
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
            // $(document).ready(function() {
            //     $('#chat_table').DataTable();
            // } );
    </script>
</body>
</html>