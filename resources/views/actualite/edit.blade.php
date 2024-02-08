@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ "Modification de l'actualité" }}</h2>
        <form action="{{ route('actualite.update', ['actualite' => $actualite->id]) }}" method="post">

            @csrf
            @method('put')

            <div>
                <label for="contenu">Titre</label><br />
                <input class="form-control" type="texte" name="titre" id="titre"
                    value="{{ old('titre', $actualite->titre) }}" required maxlength="100">
                @error('titre')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="contenu">Contenu</label> <br />
                <input class="form-control" type="texte" name="contenu" id="contenu"
                    value="{{ old('contenu', $actualite->contenu) }}" required size="150" height="50">
                @error('contenu')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" value="{{ __('Valider') }}" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
