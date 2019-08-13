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
              <textarea rows="2" cols="50" class="form-control" name="description">{{$categorie->description}}</textarea>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Zdjecie">Plik ze zdjeciem:</label>
              <input type="file" class="form-control" name="picture_file_name" accept=".jpg, .png, .jpeg">
            </div>
          </div>		  
        <button type="submit" class="btn btn-primary">Edytuj</button>
		<a href="{{ route('categories.index')}}" class="btn btn-danger">Anuluj</a>
      </form>
	  
  </div>
</div>
@endsection