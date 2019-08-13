@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Zmień edytora
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
      <form method="post" action="{{ route('editors.update', $editor->id) }}">
        @method('PATCH')
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
            <input type="text" class="form-control" name="supereditor">
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