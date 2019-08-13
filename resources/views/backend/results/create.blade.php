@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Dodaj wynik
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
      <form method="post" action="{{ route('results.store') }}">
          @csrf
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="set">Zestaw:</label>
              <select name="sets_id">
                @foreach($sets as $set)
                <option value="{{$set->id}}">{{$set->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="User">Użytkownik:</label>
              <select name="users_id">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}} ( {{$user->id}} )</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Data">Data:</label>
            <input type="text" class="form-control" name="date">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="procent">Procent:</label>
            <input type="text" class="form-control" name="percent">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Wyślij</button>
			<a href="{{ route('results.index')}}" class="btn btn-danger">Anuluj</a>
          </div>
        </div>
      </form>
  </div>
</div>
@endsection