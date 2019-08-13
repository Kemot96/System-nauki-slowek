@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Edycja kategorię
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
      <form method="post" action="{{ route('categories.update', $categorie->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Nazwa">Nazwa:</label>
            <input type="text" class="form-control" name="name" value={{ $categorie->name }}>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Opis">Opis:</label>
              <input type="text" class="form-control" name="description" value={{ $categorie->description }}>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Zdjecie">Plik ze zdjeciem:</label>
              <input type="text" class="form-control" name="picture_file_name" value={{ $categorie->picture_file_name }}>
            </div>
          </div>		  
        <button type="submit" class="btn btn-primary">Edytuj</button>
		<a href="{{ route('categories.index')}}" class="btn btn-danger">Anuluj</a>
      </form>
	  
  </div>
</div>
@endsection