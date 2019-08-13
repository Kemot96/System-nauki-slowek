@extends('layout')

@section('content')


  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Podkategorie</h1>
  <table class="table table-striped">
    <thead>
        <tr>
            <td>Nazwa</td>
            <td>Opis</td>
            <td>Plik ze zdjęciem</td>
            <td>Kategoria</td>
            <td>Rola</td>
            @if(\Auth::user()->is("Administrator"))
                <td colspan="2">Akcje</td>
            @endif
        </tr>
    </thead>
    <tbody>
    
        @foreach($subcategories as $subcategorie)
        <tr>
            <td>{{$subcategorie->name}}</td>
            <td>{{$subcategorie->description}}</td>
            <td>{{$subcategorie->picture_file_name}}</td>
            <td>{{$subcategorie->categorie->name}}</td>
            <td>
            @foreach($subcategorie->roles as $role)
                {{$role->name}}
            @endforeach
            </td>
			@if(\Auth::user()->is("Administrator"))
            <td><a href="{{ route('subcategories.edit',$subcategorie->id)}}" class="btn btn-primary">Edytuj</a></td>
            <td>
                <form action="{{ route('subcategories.destroy', $subcategorie->id)}}" method="post">
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
  {{ $subcategories->links() }}
  @if(\Auth::user()->is("Administrator"))
    <a href="{{ route('subcategories.create')}}" class="btn btn-success">Dodaj podkategorię</a>
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
          <td>ID kategorii</td>
          <td colspan="2">Akcje</td>
      </tr>
      </thead>
      <tbody>
      @foreach($onlySoftDeleted as $subcategorie)
          <tr>

              <td>{{$subcategorie->name}}</td>
              <td>{{$subcategorie->description}}</td>
              <td>{{$subcategorie->picture_file_name}}</td>
              <td>{{$subcategorie->categorie->name}}</td>


              <td><a href="{{ route('subcategories.show',$subcategorie->id)}}" class="btn btn-primary">Przywróć</a></td> 
          </tr>
      @endforeach
      </tbody>
  </table>
  @endif
@endsection