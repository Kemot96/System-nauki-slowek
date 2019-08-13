@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Dodaj edytora
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
      <form method="post" action="{{ route('editors.store') }}">
          @csrf
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
              <label for="Podkategoria">Podkategoria:</label>
              <select name="subcategories_id">
                @foreach($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Supereditor">Superedytor:</label>
            Tak: <input type="radio" class="form-control" name="supereditor" value="1">
            Nie: <input type="radio" class="form-control" name="supereditor" value="0" checked="checked">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Wyślij</button>
			<a href="{{ route('editors.index')}}" class="btn btn-danger">Anuluj</a>
          </div>
        </div>
      </form>
  </div>
</div>
@endsection