<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">

    <title>404 not found</title>
</head>
    <body>
        <div class="container-not-found">
            <h1 class="error-404">404</h1>
            <p class="not-found">Oops, sorry we can't find that page !</p>

           <span class="go-home-link">
               <a href="{{ url('/') }}">Go home</a>
           </span>

        </div>
    </body>


</html>
