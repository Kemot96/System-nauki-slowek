@extends('layout')

@section('content')


  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Zestawy</h1>
  <table class="table table-striped">
    <thead>
        <tr>

            <td>Nazwa</td>
            <td>Słowa</td>
            <td>Ilość słów</td>
            <td>Język 1</td>
            <td>Język 2</td>
            <td>Podkategoria</td>
            <td>Użytkownik</td>
        <td colspan="2">Akcje</td>
        </tr>
    </thead>
    <tbody>
        @foreach($sets as $set)
        <tr>

            <td>{{$set->name}}</td>
            <td>{{$set->words}}</td>
            <td>{{$set->number_of_words}}</td>
            <td>{{$set->language1->name}}</td>
            <td>{{$set->language2->name}}</td>
            <td>{{$set->subcategorie->name}}</td>
            <td>{{$set->user->name}}</td>
			
            <td><a href="{{ route('sets.edit',$set->id)}}" class="btn btn-primary">Edytuj</a></td>
            <td>
                <form action="{{ route('sets.destroy', $set->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $sets->links() }}
  <a href="{{ route('sets.create')}}" class="btn btn-success">Dodaj zestaw</a>
  <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>
  <div><b>Usunięte rekordy: </b></div>

  <table class="table table-striped">
      <thead>
      <tr>

          <td>Nazwa</td>
          <td>Słowa</td>
          <td>Ilość słów</td>
          <td>Język 1</td>
          <td>Język 2</td>
          <td>Podkategoria</td>
          <td>Użytkownik</td>
          <td colspan="2">Akcje</td>
      </tr>
      </thead>
      <tbody>
      @foreach($onlySoftDeleted as $set)
          <tr>

              <td>{{$set->name}}</td>
              <td>{{$set->words}}</td>
              <td>{{$set->number_of_words}}</td>
              <td>{{$set->language1->name}}</td>
              <td>{{$set->language2->name}}</td>
              <td>{{$set->subcategorie->name}}</td>
              <td>{{$set->user->name}}</td>

              <td><a href="{{ route('sets.show',$set->id)}}" class="btn btn-primary">Przywróć</a></td> 
          </tr>
      @endforeach
      </tbody>
  </table>

@endsection