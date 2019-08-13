@extends('layout')

@section('content')


  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Kategorie</h1>
  <table class="table table-striped">
    <thead>
        <tr>
        <td>Nazwa</td>
        <td>Opis</td>
        <td>Plik ze zdjęciem</td>
        @if(\Auth::user()->is("Administrator"))
            <td colspan="2">Akcje</td>
        @endif
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $categorie)
        <tr>
            <td>{{$categorie->name}}</td>
            <td>{{$categorie->description}}</td>
            <td>{{$categorie->picture_file_name}}</td>

			@if(\Auth::user()->is("Administrator"))
            <td><a href="{{ route('categories.edit',$categorie->id)}}" class="btn btn-primary">Edytuj</a></td>
            <td>
                <form action="{{ route('categories.destroy', $categorie->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń</button>
                </form>
            </td>
            @endif
        </tr>

        @endforeach
    </tbody>
  </table>
  {{ $categories->links() }}
  @if(\Auth::user()->is("Administrator"))
    <a href="{{ route('categories.create')}}" class="btn btn-success">Dodaj kategorię</a>
  @endif
  <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>
  @if(\Auth::user()->is("Administrator"))
  <div><b>Usunięte rekordy: </b></div>

  <table class="table table-striped">
      <thead>
      <tr>
          <td>Nazwa</td>
          <td>Opis</td>
          <td>Plik ze zdjęciem</td>
          <td colspan="2">Akcje</td>
      </tr>
      </thead>
      <tbody>
      @foreach($onlySoftDeleted as $categorie)
          <tr>
              <td>{{$categorie->name}}</td>
              <td>{{$categorie->description}}</td>
              <td>{{$categorie->picture_file_name}}</td>
              <td><a href="{{ route('categories.show',$categorie->id)}}" class="btn btn-primary">Przywróć</a></td> 
          </tr>
      @endforeach
      </tbody>
  </table>
  @endif
<div>
@endsection