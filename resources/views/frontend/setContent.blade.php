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

        #nazwa{
            font-weight: bold;
            font-size: x-large;
            text-align: center;
        }

        #nauka{
            font-weight: bold;
            font-size: x-large;
            text-align: center;
        }

        .row
        {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }


    </style>
</head>
<body>
<div class=" position-ref full-height">
    <div class="content">



        @foreach($sets as $set)
            @if ($set->id == $id)
                <p id = "nazwa">Nazwa zestawu: {{$set->name}}</p>
            @endif
        @endforeach

        <br>
        @foreach($sets as $set)
            @if ($set->id == $id)
                    @foreach(explode("\n", $set->words) as $line)
                       <p id="nazwa">{!! str_replace(';',' - ',$line) !!} </p>
                        <br>
                    @endforeach
            @endif
        @endforeach

            <p id = "nauka">Wybierz sposób nauki:</p>

            @foreach($sets as $set)
            @if ($set->id == $id)
            <div class="row">
                @foreach($languages as $language)
                    @if ($language->id == $set -> languages1_id)
                        {{$language -> name}} ->
                    @endif
                @endforeach
                @foreach($languages as $language)
                    @if ($language->id == $set -> languages2_id) {{$language -> name}}
                    @endif


                @endforeach
                <a href="{{ url('/study1/'.$set->id) }}" class="btn btn-success" >Pytaj o każde słowo tylko raz</a>
                <a href="{{ url('/study2/'.$set->id) }}" class="btn btn-success" >Pytaj o każde słowo dopóki wszystkie będą poprawnie przetłumaczone</a>

            </div>
                    <div class="row">
                    @foreach($languages as $language)
                        @if ($language->id == $set -> languages2_id)
                            {{$language -> name}} ->
                        @endif
                    @endforeach
                    @foreach($languages as $language)
                        @if ($language->id == $set -> languages1_id) {{$language -> name}}
                        @endif

                    @endforeach


                <a href="{{ url('/study4/'.$set->id) }}" class="btn btn-success" >Pytaj o każde słowo tylko raz</a>
                <a href="{{ url('/study5/'.$set->id) }}" class="btn btn-success" >Pytaj o każde słowo dopóki wszystkie będą poprawnie przetłumaczone</a>
            </div>
            @endif
            @endforeach
            <div class="row">
                <a href="{{ url('/frontwelcome') }}" class="btn btn-danger" >Wróć na stronę główną</a>
            </div>
    </div>
</div>
</body>
</html>
