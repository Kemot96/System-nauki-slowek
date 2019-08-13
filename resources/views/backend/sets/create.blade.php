@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Dodaj zestaw
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
      <form method="post" action="{{ route('sets.store') }}" id="set-form">
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
            <label for="liczba">Ilość słów:</label>
            <input type="text" class="form-control" name="number_of_words">
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
                <option value="{{$user->id}}">{{$user->name}}  ( {{$user->id}} )</option>
                @endforeach
              </select>
            </div>
          </div>
         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Slowa">Słowa:</label>
            <textarea rows="4" cols="50" class="form-control" name="words" form="set-form"></textarea>
          </div>
        </div> 
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