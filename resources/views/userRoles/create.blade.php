@extends('layout')

@section('content')

    <div class="card uper">
        <div class="card-header">
            Dodaj rolę dla użytkownika
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
            <form method="post" action="{{ route('userRoles.store') }}">
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
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="User">Role:</label><br>
                        @foreach($roles as $role)
                            <input type="checkbox" name="roles_id[]" value="{{$role->id}}">{{$role->name}}<br>
                        @endforeach
                    </div>
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