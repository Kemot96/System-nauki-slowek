@extends('layout')

@section('content')

    <div class="card uper">
        <div class="card-header">
            Dodaj rolę dla podkategorii
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('subcatRoles.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="User">Podkategoria:</label>
                        <select name="subcategories_id">
                            @foreach($subcategories as $subcat)
                                <option value="{{$subcat->id}}">{{$subcat->name}} ( {{$subcat->id}} )</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="User">Role:</label><br>
                        @foreach($roles as $role)
                        @if($role->id>1)
                            <input type="checkbox" name="roles_id[]" value="{{$role->id}}">{{$role->name}}<br>
                        @endif
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4" style="margin-top:60px">
                        <button type="submit" class="btn btn-success">Wyślij</button>
                        <a href="{{ route('subcatRoles.index')}}" class="btn btn-danger">Anuluj</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection