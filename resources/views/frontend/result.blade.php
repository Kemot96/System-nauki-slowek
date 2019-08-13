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
<?php
$dataPoints[0] = array( "y"=>0, "label" => 0);
 foreach($results as $r)
{
    if($r->users_id == \Auth::user()->id)
        $dataPoints[] = array( "y"=>$r->percent, "label" => $r->date);
    
}
?>

<script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {

	title:{
		text: "Postępy nauki"
	},
	axisY:{
		text: "Wynik"
	},
	data: [{        
		type: "column",       
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		
	}]
});
chart.render();

}
    </script>
<div class="flex-center position-ref full-height">
    <div class="container">
    <div class="title m-b-md">
            Twoje Wyniki
    </div>

    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>Nazwa zestawu</td>
            <td>Data</td>
            <td>Wynik</td>
        </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            @if($result->users_id == \Auth::user()->id)
            <tr>
                <td>{{$result->set->name}}</td>
                <td>{{$result->date}}</td>
                <td>{{$result->percent}}%</td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    
    <a href="{{ url('/frontwelcome') }}" class="btn btn-danger" >Wróć na stronę główną</a>
    </div>
</div>
</body>
</html>