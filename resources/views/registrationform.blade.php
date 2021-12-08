<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('/css/registration_form.css')}}">
    <title>Register</title>
</head>
<body>
@if(\Session::has('success'))
    <div class="alert">
        <h4>{{\Session::get('success') }}</h4>
    </div>  
    @endif
<form action="register_submit" method="POST">
@csrf
<div class="container">
    <h1>Register</h1>
    <p>Please enter credentials to register.</p>
    @if(count($errors))
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
    <hr>

    <!-- <label for="UId"><b>User Id</b></label>
    <input type="text" placeholder="Enter user id" name="UId" id="UId" required> -->
    
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" id="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" id="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter password" name="password" id="password" required>

    <label for="street_address"><b>Address</b></label>
    <input type="street_address" placeholder="Enter address" name="street_address" id="street_address" required>

    <label for="dob"><b>Date of birth</b></label>
    <input type="text" placeholder="Enter D.O.B(YYYY-MM-DD)" name="dob" id="dob" required>

    <hr>
    <button type="signin" class="registerbtn">Register</button>
</div>

</form>
</body>
</html>