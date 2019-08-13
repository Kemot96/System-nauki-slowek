@extends('layout')

@section('content')


  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Użytkownicy</h1>
  <table class="table table-striped">
    <thead>
        <tr>
        <td>Nazwa</td>
        <td>Email</td>
        <td>Hasło</td>
        <td>Roles_id</td>
        <td colspan="2">Akcje</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edytuj</a></td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń</button>
                </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  {{ $users->links() }}
  <a href="{{ route('users.create')}}" class="btn btn-success">Dodaj użytkownika</a>
  <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>
<div>
@endsection