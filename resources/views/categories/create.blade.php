@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Dodaj kategorię
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
      <form method="post" action="{{ route('categories.store') }}">
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
              <label for="Opis">Opis:</label>
              <input type="text" class="form-control" name="description">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="zdjecie">Plik ze zdjęciem:</label>
              <input type="text" class="form-control" name="picture_file_name">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Wyślij</button>
			<a href="{{ route('categories.index')}}" class="btn btn-danger">Anuluj</a>
          </div>
        </div>
      </form>
  </div>
</div>
@endsection