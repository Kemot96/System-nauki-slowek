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


    </style>


</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="container">
        <p id = "nazwa">Przetłumacz poniższe słowa: </p>
        @foreach($sets as $set)
            @if ($set->id == $id)
                <form method="post" action="{{url('/score5/'.$set->id)}}">
                    @csrf
                    <?php
                    $words = array();
                    $x = 0;
                    ?>
                    @foreach(explode("\n", $set->words) as $line)
                        <?php   $word = explode(";", $line);
                        $words[] = $word[1];
                        $wordsEng[] = $word[0];

                        $count = count($words);
                        $order = range(1, $count);

                        shuffle($order);
                        array_multisort($order, $words, $wordsEng);
                        ?>
                    @endforeach
                    @foreach($words as $words2 )
                        <?php

                        $words2 = trim($words2);
                        ?>

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">

                                <label for="Nazwa">{{$words2}}
                                    <input type="text" class="form-control" name="{{$words2}}">
                                </label>
                            </div>
                        </div>

                        <?php
                        $x++;
                        ?>
                    @endforeach
                    <div class="row">
                        <button type="submit" class="btn btn-success">Wyślij</button>
                        <a href="{{ url('/setContent/'.$set->id) }}" class="btn btn-danger" >Anuluj</a>
                    </div>
                </form>
            @endif
        @endforeach




    </div>
</div>
</body>
</html>
