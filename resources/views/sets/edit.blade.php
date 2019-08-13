@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Edycja zestaw
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
      <form method="post" action="{{ route('sets.update', $set->id) }}">
        @method('PATCH')
          @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Nazwa">Nazwa:</label>
            <input type="text" class="form-control" name="name" value={{ $set->name}}>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Slowa">Słowa:</label>
            <input type="text" class="form-control" name="words" value={{ $set->words}}>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="liczba">Ilość słów:</label>
            <input type="text" class="form-control" name="number_of_words" value={{ $set->number_of_words}}>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Jezyk1">Język 1:</label>
              <select name="languages1_id">
                @foreach($languages as $language)
                <option value="{{$language->id}}">{{$language->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Jezyk2">Język 2:</label>
              <select name="languages2_id">
                @foreach($languages as $language)
                <option value="{{$language->id}}">{{$language->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Subcategorie">Podkategoria:</label>
            <select name="subcategories_id">
              @foreach($subcategories as $subcategorie)
                <option value="{{$subcategorie->id}}">{{$subcategorie->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="User">Użytownik:</label>
              <select name="users_id">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          @if(\Auth::user()->is("Administrator") || Auth::user()->is("Super Redaktor"))
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="User">Prywatny:</label>
              @if($set->private == 1)
              Tak: <input type="radio" class="form-control" name="private" value="1" checked="checked">
              Nie: <input type="radio" class="form-control" name="private" value="0">
            @else
              Tak: <input type="radio" class="form-control" name="private" value="1">
              Nie: <input type="radio" class="form-control" name="private" value="0" checked="checked">
            @endif
            </div>
          </div>
          @endif
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Wyślij</button>
			<a href="{{ route('sets.index')}}" class="btn btn-danger">Anuluj</a>
          </div>
        </div>
      </form>
  </div>
</div>
@endsection