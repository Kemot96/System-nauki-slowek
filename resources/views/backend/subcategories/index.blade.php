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
            <td>ID kategorii</td>
            <td colspan="2">Akcje</td>
        </tr>
        </thead>
        <tbody>
        @foreach($subcategories as $subcategorie)
            <tr>

                <td>{{$subcategorie->name}}</td>
                <td>{{$subcategorie->description}}</td>
                <td>{{$subcategorie->picture_file_name}}</td>
                <td>{{$subcategorie->categorie->name}}</td>


                <td><a href="{{ route('subcategories.edit',$subcategorie->id)}}" class="btn btn-primary">Edytuj</a></td>
                <td>
                    <form action="{{ route('subcategories.destroy', $subcategorie->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Jesteś pewien?')" class="btn btn-danger" type="submit">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $subcategories->links() }}
    <a href="{{ route('subcategories.create')}}" class="btn btn-success">Dodaj podkategorię</a>
    <a href="{{ url('/') }}" class="btn btn-success">Powrót na stronę główną</a>

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

@endsection