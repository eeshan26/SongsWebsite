<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <title>User Report</title>
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
<!-- @if(\Session::has('success'))
        <div class="alert alert-success" role="alert">
            <h4>{{\Session::get('success') }}</h4>
        </div>
            <div class="alert">
                <h4>{{\Session::get('success') }}</h4>
            </div>  
@endif -->
<div class="container" >
        <div class="jumbotron">
            <br>
            <h1>User Report</h1>
            <hr>
            <!-- <div class="line" style="text-align:right;">
                <a href="/favouriteSongs" class="btn btn-primary">Favourite Songs</a>
            </div> -->
            <br>
            <h2>Friends</h2>
            <br>
            <form>
                <table id="report_friends_table" class="table table-hover table-dark table-borderless">
                    <thead class="thead-dark">
                        <tr>
                            <th>Friends Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($friends as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>

            <hr>
            <h2>Groups</h2>
            <br>
            <form>
                <table id="report_groups_table" class="table table-hover table-dark table-borderless">
                    <thead class="thead-dark">
                        <tr>
                            <th>Groups Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $row)
                        <tr>
                            <td>{{$row->group_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>


            <hr>
            <h2>Messages sent to friends</h2>
            <br>
            <form>
                <table id="report_message_sent_table" class="table table-hover table-dark table-borderless">
                    <thead class="thead-dark">
                        <tr>
                            <th>Reciever Name</th>
                            <th>Messsage</th>
                            <th>timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sent_message as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->body}}</td>
                            <td>{{$row->date_time}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>

            <hr>
            <h2>Messages recieved from friends</h2>
            <br>
            <form>
                <table id="report_message_recieved_table" class="table table-hover table-dark table-borderless">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sender Name</th>
                            
                            <th>Messsage</th>
                            <th>timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recieved_message as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->body}}</td>
                            <td>{{$row->date_time}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>

            <hr>
            <h2>Messages sent to groups</h2>
            <br>
            <form>
                <table id="report_sent_group_table" class="table table-hover table-dark table-borderless">
                    <thead class="thead-dark">
                        <tr>
                            <th>Group Name</th>
                            <th>Messsage</th>
                            <th>timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($group_sent as $row)
                        <tr>
                            <td>{{$row->group_name}}</td>
                            <td>{{$row->body}}</td>
                            <td>{{$row->date_time}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>

            <hr>
            <h2>Messages recieved groups</h2>
            <br>
            <form>
                <table id="report_recieved_group_table" class="table table-hover table-dark table-borderless">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sender Name</th>
                            <th>Group id</th>
                            <th>Messsage</th>
                            <th>timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($group_recieve as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->GId}}</td>
                            <td>{{$row->body}}</td>
                            <td>{{$row->date_time}}</td>
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
                $('#report_friends_table').DataTable();
            } );
    </script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#report_groups_table').DataTable();
            } );
    </script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#report_message_sent_table').DataTable();
            } );
    </script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#report_message_recieved_table').DataTable();
            } );
    </script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#report_sent_group_table').DataTable();
            } );
    </script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#report_recieved_group_table').DataTable();
            } );
    </script>
</body>
</html>