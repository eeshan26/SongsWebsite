<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{url('/css/registration_form.css')}}">
        <title>Write Message</title>
    </head>
    <body>
        @if(\Session::has('success'))
        <div class="alert">
            <h4>{{\Session::get('success') }}</h4>
        </div>  
        @endif
    <form action="/sendMessage" method="POST">
    @csrf
    <div class="container">
        <hr>

        <label for="message"><b>Message</b></label>
        <input type="text" placeholder="Enter text" name="message" id="message"  required>

        <hr>
        <button type="submit" class="registerbtn">Send</button>
    </div>

    </form>
    </body>
    </html>