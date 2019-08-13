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
            Stwórz zestaw
        </div>
        <form method="post" action="{{ route('set.store') }}">
          @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Nazwa">Nazwa:</label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="liczba">Ilość słów:</label>
            <input type="text" class="form-control" name="number_of_words">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Jezyk1">Język 1:</label>
              <select name="languages1_id">
                @foreach($languages as $language)
                <option value="{{$language->id}}">{{$language->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Jezyk2">Język 2:</label>
              <select name="languages2_id">
                @foreach($languages as $language)
                <option value="{{$language->id}}">{{$language->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Subcategorie">Podkategoria:</label>
            <select name="subcategories_id">
            @foreach($subcategories as $subcategorie)
            @if((\Auth::user()->is("Redaktor")&&$subcategorie->has("Redaktor"))||(\Auth::user()->is("Super Redaktor")&&$subcategorie->has("Super Redaktor")))
              <option value="{{$subcategorie->id}}">
              {{$subcategorie->name}}
              @foreach($subcategorie->roles as $role)
                ({{$role->name}})
              @endforeach
              </option>
            @elseif(\Auth::user()->is("Administrator") || \Auth::user()->is(null))
              <option value="{{$subcategorie->id}}">{{$subcategorie->name}}</option>
            @endif
            @endforeach
            </select>
          </div>
        </div>
         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Slowa">Słowa:</label>
            <textarea rows="4" cols="50" class="form-control" name="words"></textarea>
          </div>
        </div> 
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Wyślij</button>
			<a href="{{ route('set.index')}}" class="btn btn-danger">Anuluj</a>
          </div>
        </div>
      </form>


    </div>
</div>
</body>
</html>