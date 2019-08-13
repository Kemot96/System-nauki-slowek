@extends('layout')

@section('content')


  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Role</h1>
  <table class="table table-striped">
    <thead>
        <tr>
        <td>Nazwa</td>
        <td>Opis</td>
        <td colspan="2">Akcje</td>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{$role->name}}</td>
            <td>{{$role->description}}</td>			
            <td><a href="{{ route('roles.edit',$role->id)}}" class="btn btn-primary">Edytuj</a></td>
            <td>
                <form action="{{ route('roles.destroy', $role->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $roles->links() }}
  <a href="{{ route('roles.create')}}" class="btn btn-success">Dodaj rolę</a>
  <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>
  <div><b>Usunięte rekordy: </b></div>

  <table class="table table-striped">
      <thead>
      <tr>
          <td>Nazwa</td>
          <td>Opis</td>
          <td colspan="2">Akcje</td>
      </tr>
      </thead>
      <tbody>
      @foreach($onlySoftDeleted as $role)
          <tr>
              <td>{{$role->name}}</td>
              <td>{{$role->description}}</td>
              <td><a href="{{ route('roles.show',$role->id)}}" class="btn btn-primary">Przywróć</a></td> 
          </tr>
      @endforeach
      </tbody>
  </table>
<div>
@endsection