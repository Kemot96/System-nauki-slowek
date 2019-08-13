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
    @if(\Auth::user()->is("Super Redaktor")||\Auth::user()->is("Redaktor"))
    <tbody>
        @foreach($sets as $set)
        <tr>
            <td>{{$set->name}}</td>
            <td>{{$set->words}}</td>
            <td>{{$set->number_of_words}}</td>
            <td>{{$set->language1->name}}</td>
            <td>{{$set->language2->name}}</td>
            <td>
                {{$set->subcategorie->name}}
                @foreach($set->subcategorie->roles as $role)
                ({{$role->name}})
                @endforeach
            </td>
            <td>{{$set->user->name}} ( {{$set->user->id}} )</td>
			@if(\Auth::user()->is("Super Redaktor") && $set->subcategorie->has("Super Redaktor"))
            <td><a href="{{ route('sets.edit',$set->id)}}" class="btn btn-primary">Edytuj</a></td>
            <td>
                <form action="{{ route('sets.destroy', $set->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń</button>
                </form>
            </td>
            @else
            <td></td>
            @endif
        </tr>
        @endforeach
    </tbody>
    @else
    <tbody>
        @foreach($sets as $set)
        <tr>
            <td>{{$set->name}}</td>
            <td>{{$set->words}}</td>
            <td>{{$set->number_of_words}}</td>
            <td>{{$set->language1->name}}</td>
            <td>{{$set->language2->name}}</td>
            <td>
            {{$set->subcategorie->name}}
            </td>
            <td>{{$set->user->name}} ( {{$set->user->id}} )</td>
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
    @endif
  </table>
  {{ $sets->links() }}
  @if(\Auth::user()->is("Administrator"))
  <a href="{{ route('sets.create')}}" class="btn btn-success">Dodaj zestaw</a>
  @endif
  <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>
  @if(\Auth::user()->is("Administrator") || \Auth::user()->is("Super Redaktor"))
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
          <td colspan="2">Akcja</td>
      </tr>
      </thead>
      <tbody>
      @foreach($onlySoftDeleted as $set)
        @foreach($set->subcategorie->roles as $role)
          <tr>

              <td>{{$set->name}}</td>
              <td>{{$set->words}}</td>
              <td>{{$set->number_of_words}}</td>
              <td>{{$set->language1->name}}</td>
              <td>{{$set->language2->name}}</td>
              <td>
              {{$set->subcategorie->name}}
                @if(\Auth::user()->is("Super Redaktor"))
                    ({{$role->name}})
                @endif
              </td>
              <td>{{$set->user->name}}</td>
              @if(\Auth::user()->is("Administrator") || (\Auth::user()->is("Super Redaktor") || $role->id == 2))
                <td><a href="{{ route('sets.show',$set->id)}}" class="btn btn-primary">Przywróć</a></td>
              @endif
          </tr>
          @endforeach
      @endforeach
      </tbody>
  </table>
  @endif
@endsection