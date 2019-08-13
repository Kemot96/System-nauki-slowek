@extends('layout')

@section('content')


  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Wyniki</h1>
  <table class="table table-striped">
    <thead>
        <tr>

            <td>Zestaw</td>
            <td>Użytkownik</td>
            <td>Data</td>
            <td>Procent</td>
        <td colspan="2">Akcje</td>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $result)
        <tr>

            <td>{{$result->set->name}}</td>
            <td>{{$result->user->name}}</td>
            <td>{{$result->date}}</td>
            <td>{{$result->percent}}%</td>
			
            <td><a href="{{ route('results.edit',$result->id)}}" class="btn btn-primary">Edytuj</a></td>
            <td>
                <form action="{{ route('results.destroy', $result->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $results->links() }}
  <a href="{{ route('results.create')}}" class="btn btn-success">Dodaj wynik</a>
  <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>
@endsection