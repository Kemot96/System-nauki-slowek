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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ action('UserController@index') }}">Lista osób</a>
                        <a href="{{ action('RoleController@index') }}">Lista roli</a>
                        <a href="{{ action('EditorController@index') }}">Lista edytorów</a>
                        <a href="{{ action('SetController@index') }}">Lista zestawów</a>
                        <a href="{{ action('CategorieController@index') }}">Lista kategorii</a>
                        <a href="{{ action('SubcategorieController@index') }}">Lista podkategorii</a>
                        <a href="{{ action('LanguageController@index') }}">Lista języków</a>
                        <a href="{{ action('ResultController@index') }}">Lista wyników</a>
                        <a href="{{ action('UserRoleController@index') }}">Lista ról dla użytkowników</a>
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Nauka słówek
                </div>

                <div class="links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('users.index') }}"  class="btn btn-primary">Lista osób</a>
                        <a href="{{ route('roles.index') }}"  class="btn btn-primary">Lista roli</a>
                        <a href="{{ route('editors.index') }}"  class="btn btn-primary">Lista edytorów</a>
                        <a href="{{ route('sets.index') }}"  class="btn btn-primary">Lista zestawów</a>
                        <a href="{{ route('categories.index') }}"  class="btn btn-primary">Lista kategorii</a>
                        <a href="{{ route('subcategories.index') }}"  class="btn btn-primary">Lista podkategorii</a>
                        <a href="{{ route('languages.index') }}"  class="btn btn-primary">Lista języków</a>
                        <a href="{{ route('results.index') }}"  class="btn btn-primary">Lista wyników</a>
                            <a href="{{ route('userRoles.index') }}"  class="btn btn-primary">Lista ról dla użytkowników</a>
                    @endauth
            @endif
                </div>
            </div>
        </div>
    </body>
</html>
