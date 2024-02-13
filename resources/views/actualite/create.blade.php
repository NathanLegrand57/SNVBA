@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ "Création d'une actualité" }}</h2>
        <form action="{{ route('actualite.store') }}" method="post">

            @csrf

            <div class="form-group">
                <x-input-text property="titre" maxlength="100" label="{{ 'Libellé' }}" />
            </div>

            <div class="form-group">
                <x-input-text property="contenu" maxlength="100" label="{{ 'Contenu de l\'actualité' }}" />
            </div>

            <div class="form-group">
                <input type="submit" value="{{ 'Valider' }}" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
