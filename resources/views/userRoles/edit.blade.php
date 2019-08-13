@extends('layout')

@section('content')

    <div class="card uper">
        <div class="card-header">
            Edycja roli użytkownika
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
                <form method="post" action="{{ route('userRoles.update', $users->users_id) }}">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="User">Użytkownik:</label>
                        <select name="users_id">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <input type="checkbox" name="roles_id[]" value="1">Administrator<br>
                    <input type="checkbox" name="roles_id[]" value="2">Super Redaktor<br>
                    <input type="checkbox" name="roles_id[]" value="3">Redaktor<br>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4" style="margin-top:60px">
                        <button type="submit" class="btn btn-success">Wyślij</button>
                        <a href="{{ route('userRoles.index')}}" class="btn btn-danger">Anuluj</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection