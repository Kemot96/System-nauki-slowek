<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #FFE4B5;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }


        .links > a {
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .row
        {
            text-align: center;
            font-weight: bold;
            font-size: 400%;
        }


    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">


        <div class="row">
            Wynik = {{$score}}/{{$numberOfWords}}

        </div>

        <div class="row">
            @if($user = Auth::user())
                Twój wynik został zapisany!
            @endif
        </div>

        <div class="row">
            <a href="{{ url('/frontwelcome') }}" class="btn btn-danger" >Wróć na stronę główną</a>
        </div>







    </div>
</div>
</body>
</html>
