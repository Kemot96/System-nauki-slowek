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
            table, td, tr {
                border: 2px solid black;
            }
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;


            }
        </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="container">
    <div class="title m-b-md">
            Podkategorie
        </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>Nazwa</td>
            <td>Ilość słów</td>
            <td>Język 1</td>
            <td>Język 2</td>
            <td>Twórca</td>
        </tr>
        </thead>
        <tbody>
        @foreach($sets as $set)
            <tr>
                @if ($set->subcategories_id == $id)
                    @if ($set->private == 0 )
                    <td><a href="{{ url('/set/'.$set->id) }}" >{{$set->name}}</a></td>
                <td>{{$set->number_of_words}}</td>
                <td>{{$set->language1->name}}</td>
                <td>{{$set->language2->name}}</td>
                <td>{{$set->user->name}}</td>
                @endif
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ url('/frontwelcome') }}" class="btn btn-danger" >Wróć na stronę główną</a>

    </div>
</div>
</body>
</html>
