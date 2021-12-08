<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app1.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body style="background-color: #262626">
    @if(\Session::has('success'))
        <br>
        <div class="alert alert-success" role="alert">
            <h4>{{\Session::get('success') }}</h4>
        </div>  
    @endif
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Dashboard</a>
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
    <div class="container">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Logout
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </div>
            
        <div class="row justify-content-md-center">
        <!-- <div class="row" style="height:180px;">
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registration</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> 
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> 
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Departments</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Geofences</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
        </div> -->
        <div class="col col-md-4">
            <a href="/displaySongsData">
                <button class="btn1" id="b1"> Songs</button>
            </a>
        </div> 
        <div class="col col-md-4"> 
            <a href="/displayFriendsData">
                <button class="btn1" id="b2">Friends</button>
            </a>
        </div>
        <div class="col col-md-4">
            <a href="/displayGroupsData">
                <button class="btn1" id="b3">Groups</button>
            </a>
        </div>
        <div class="col col-md-4">
            <a href="/displayReport">
                <button class="btn1" id="b3">Report</button>
            </a>
        </div>
        <!-- <div class="col col-md-4">
            <a href="/displayview1">
                <button class="btn1" id="b4"> View 1</button>
            </a>
        </div> 
        <div class="col col-md-4"> 
            <a href="/displayview2">
                <button class="btn1" id="b5">View 2</button>
            </a>
        </div>
        <div class="col col-md-4">
            <a href="/displayview3">
                <button class="btn1" id="b6">View 3</button>
            </a>
        </div><div class="col col-md-4">
            <a href="/displayview4">
                <button class="btn1" id="b7"> View 4</button>
            </a>
        </div> 
        <div class="col col-md-4"> 
            <a href="/displayview5">
                <button class="btn1" id="b8">View 5</button>
            </a>
        </div>
        <div class="col col-md-4">
            <a href="/displayview6">
                <button class="btn1" id="b9">View 6</button>
            </a>
        </div> -->
        <!-- <div class="col col-md-3">
            <a href="/display_geofence_data">
                <button class="btn1" id="b4">Geofence</button>
            </a>
        </div> -->
    </div>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</body>
</html>