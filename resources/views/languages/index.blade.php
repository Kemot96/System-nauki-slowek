@extends('layout')

@section('content')


  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Języki</h1>
  <table class="table table-striped">
    <thead>
        <tr>
        <td>Nazwa</td>
        <td>Symbol</td>
        <td colspan="2">Akcje</td>
        </tr>
    </thead>
    <tbody>
        @foreach($languages as $language)
        <tr>
            <td>{{$language->name}}</td>
            <td>{{$language->symbol}}</td>

			
            <td><a href="{{ route('languages.edit',$language->id)}}" class="btn btn-primary">Edytuj</a></td>
            <td>
                <form action="{{ route('languages.destroy', $language->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $languages->links() }}
  <a href="{{ route('languages.create')}}" class="btn btn-success">Dodaj język</a>
  <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>
  <div><b>Usunięte rekordy: </b></div>

  <table class="table table-striped">
      <thead>
      <tr>
          <td>Nazwa</td>
          <td>Symbol</td>
          <td colspan="2">Akcje</td>
      </tr>
      </thead>
      <tbody>
      @foreach($onlySoftDeleted as $language)
          <tr>
              <td>{{$language->name}}</td>
              <td>{{$language->symbol}}</td>
              <td><a href="{{ route('languages.show',$language->id)}}" class="btn btn-primary">Przywróć</a></td>           
          </tr>
      @endforeach
      </tbody>
  </table>

<div>
@endsection