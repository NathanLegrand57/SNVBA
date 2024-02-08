@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ "Création d'un partenaire" }}</h2>
        <form action="{{ route('partenaire.store') }}" method="post">

            @csrf

            <div class="form-group">
                <x-input-text property="libelle" maxlength="100" label="{{ 'Libellé' }}" />
            </div>

            <div class="form-group">
                <input type="submit" value="{{ 'Valider' }}" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
