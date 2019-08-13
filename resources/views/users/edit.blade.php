@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Edycja użytkownika
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
      <form method="post" action="{{ route('users.update', $user->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Nazwa">Nazwa:</label>
            <input type="text" class="form-control" name="name" value={{ $user->name }}>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Email">Email:</label>
              <input type="text" class="form-control" name="email" value={{ $user->email }}>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Haslo">Hasło:</label>
              <input type="text" class="form-control" name="password" value={{ $user->password }}>
            </div>
          </div>

        <button type="submit" class="btn btn-primary">Edytuj</button>
		<a href="{{ route('users.index')}}" class="btn btn-danger">Anuluj</a>
      </form>
	  
  </div>
</div>
@endsection