@extends('layout')

@section('content')

  <div class="card uper">
    <div class="card-header">
      Edycja podkategorii
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
      <form method="post" action="{{ route('subcategories.update', $subcategorie->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Nazwa">Nazwa:</label>
            <input type="text" class="form-control" name="name" value={{ $subcategorie->name}}>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Opis">Opis:</label>
            <textarea rows="4" cols="50" class="form-control" name="description">{{$subcategorie->description}}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Zdjecie">Plik ze zdjeciem:</label>
            <input type="text" class="form-control" name="picture_file_name"  value={{ $subcategorie->picture_file_name}}>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Kategoria">Kategoria:</label>
              <select name="categories_id">
                @foreach($categories as $categorie)
                  <option value="{{$categorie->id}}" @if($subcategorie->categories_id == $categorie->id) selected="selected" @endif>{{$categorie->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        <button type="submit" class="btn btn-primary">Edytuj</button>
        <a href="{{ route('subcategories.index')}}" class="btn btn-danger">Anuluj</a>
      </form>

    </div>
  </div>
@endsection