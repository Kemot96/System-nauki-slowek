@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Edycja języka
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
      <form method="post" action="{{ route('languages.update', $language->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Imie">Nazwa:</label>
            <input type="text" class="form-control" name="name" value={{ $language->name }}>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Nazwisko">Symbol:</label>
              <input type="text" class="form-control" name="symbol" value={{ $language->symbol }}>
            </div>
          </div>		  
        <button type="submit" class="btn btn-primary">Edytuj</button>
		<a href="{{ route('languages.index')}}" class="btn btn-danger">Anuluj</a>
      </form>
	  
  </div>
</div>
@endsection