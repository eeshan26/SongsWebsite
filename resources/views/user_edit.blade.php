<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{url('/css/registration_form.css')}}">
    <title>Edit User info</title>
</head>
<body>
    @if(\Session::has('success'))
    <div class="alert">
        <h4>{{\Session::get('success') }}</h4>
    </div>  
    @endif
<form action="/update_user_data/{{$user[0]->UId}}" method="POST">
@csrf
<div class="container">
    <h1>Update</h1>
    <p>Please fill this form to edit user info.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" id="name" value="{{$user[0]->name}}" required>

    <label for="email"><b>email</b></label>
    <input type="text" placeholder="Enter email" name="email" id="email" value="{{$user[0]->email}}" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" value="{{$user[0]->password}}" required>
    
    <label for="street_address"><b>Address</b></label>
    <input type="text" placeholder="Enter address" name="street_address" id="street_address" value="{{$user[0]->street_address}}" required>
    
    <label for="dob"><b>Date of birth</b></label>
    <input type="text" placeholder="Enter dob" name="dob" id="dob" value="{{$user[0]->dob}}" required>
    <hr>
    <button type="submit" class="registerbtn">Update user data</button>
</div>

</form>
</body>
</html>