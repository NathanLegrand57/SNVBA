@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ 'Modification du partenaire' }}</h2>
        <form action="{{ route('partenaire.update', ['partenaire' => $partenaire->id]) }}" method="post">

            @csrf
            @method('put')

            <div>
                <label for="contenu">Libellé</label><br />
                <input class="form-control" type="texte" name="libelle" id="libelle"
                    value="{{ old('libelle', $partenaire->libelle) }}" required maxlength="100">
                @error('libelle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" value="{{ __('Valider') }}" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
