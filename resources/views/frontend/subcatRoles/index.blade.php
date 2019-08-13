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

            <td>Podkategoria</td>
            <td>Rola</td>
            <td>Akcja</td>



        </tr>
        </thead>
        <tbody>

        @foreach ($subcategorie as $subcat)

                <tr>
                    <td>{{ $subcat->name }}</td>
                    <td>@foreach ($subcat -> roles as $role)
                            {{ $role->name }}
                        @endforeach</td>

                    <td>

                        <form action="{{ route('subcatRoles.destroy', $subcat->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń wszystkie role</button>
                        </form>
                    </td>

                </tr>
        @endforeach

        </tbody>
    </table>
    <a href="{{ route('subcatRoles.create')}}" class="btn btn-success">Zmień role dla podkategorii</a>
    <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>

@endsection