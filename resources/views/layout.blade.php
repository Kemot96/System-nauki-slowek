<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 5.7 CRUD Example Tutorial</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <style>
            table, td, tr {
                border: 2px solid black;
            }
            html, body {
                background-color: #fff;
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
<div class="links">
                @if (Route::has('login'))
                    @auth
                    @if(\Auth::user()->is("Administrator"))
                        <a href="{{ route('users.index') }}">Lista osób</a>
                        <a href="{{ route('roles.index') }}">Lista roli</a>
                        <a href="{{ route('userRoles.index') }}">Lista ról dla użytkowników</a>
                        <a href="{{ route('subcatRoles.index') }}">Podkategorie dla ról</a>
                    @endif
                        <a href="{{ route('categories.index') }}">Lista kategorii</a>
                        <a href="{{ route('subcategories.index') }}">Lista podkategorii</a>
                        <a href="{{ route('editors.index') }}">Lista edytorów</a>
                        <a href="{{ route('sets.index') }}">Lista zestawów</a>
                        <a href="{{ route('languages.index') }}">Lista języków</a>
                        <a href="{{ route('results.index') }}">Lista wyników</a>
                        <a href="{{ url('/home') }}"   class="btn btn-primary">Home</a>
                    @endauth
            @endif
                </div>
<div class="container">

  @yield('content')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>