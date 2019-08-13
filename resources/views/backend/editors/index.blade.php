@extends('layout')

@section('content')


  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Edytorzy</h1>
  <table class="table table-striped">
    <thead>
        <tr>

            <td>Użytkownik</td>
            <td>Podkategoria</td>
            <td>Superedytor</td>
            
        <td colspan="2">Akcje</td>
        </tr>
    </thead>
    <tbody>
        @foreach($editors as $editor)
        <tr>

            <td>{{$editor->user->name}} ( {{$editor->user->id}} )</td>
            <td>{{$editor->subcategorie->name}}</td>
            <td>{{$editor->supereditor}}</td>
			
            <td><a href="{{ route('editors.edit',$editor->id)}}" class="btn btn-primary">Edytuj</a></td>
            <td>
                <form action="{{ route('editors.destroy', $editor->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $editors->links() }}
  <a href="{{ route('editors.create')}}" class="btn btn-success">Dodaj edytora</a>
  <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>
@endsection