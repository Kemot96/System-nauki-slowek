@extends('layout')

@section('content')


    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
        <tr>

            <td>Użytkownik</td>
            <td>Rola</td>
            <td>Akcja</td>



        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)

                <tr>
                    <td>{{ $user->name }}</td>
                    <td>@foreach ($user -> roles as $role)
                            {{ $role->name }}
                        @endforeach</td>

                    <td>

                        <form action="{{ route('userRoles.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń wszystkie role</button>
                        </form>
                    </td>

                </tr>
        @endforeach

        </tbody>
    </table>
    <a href="{{ route('userRoles.create')}}" class="btn btn-success">Zmień role dla użytkownika</a>
    <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>

@endsection