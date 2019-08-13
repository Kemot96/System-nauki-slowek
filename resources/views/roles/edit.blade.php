@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Edycja rolę
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
      <form method="post" action="{{ route('roles.update', $role->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Nazwa">Nazwa:</label>
            <input type="text" class="form-control" name="name" value={{ $role->name }}>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Opis">Opis:</label>
              <input type="text" class="form-control" name="description" value={{ $role->description }}>
            </div>
          </div>		  
        <button type="submit" class="btn btn-primary">Edytuj</button>
		<a href="{{ route('roles.index')}}" class="btn btn-danger">Anuluj</a>
      </form>
	  
  </div>
</div>
@endsection