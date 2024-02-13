
@extends('layouts.app')

@section('content')

    <body>
        @can('partenaire-create')
            <x-create-button property="partenaire" />
        @endcan
        @forelse ($partenaires as $partenaire)
        @can('partenaire-delete')
            <form action="{{ route('partenaire.destroy', $partenaire->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endcan
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">{{ 'Nom du partenaire' }} : {{ $partenaire->libelle }}</h5>
                    @can('partenaire-update')
                        <x-update-button property="partenaire" :model="$partenaire" />
                    @endcan
                </div>
            </div>
        @can('partenaire-suggest-update')
            <form action="{{ route('partenaire.show', $partenaire->id) }}" method="get">
                @csrf
                <button type="submit" class="btn btn-info">Suggest</button>
            </form>
        @endcan

        @empty
            <p class="ms-3">
                Aucun partenaire connu
            </p>
        @endforelse
    </body>

    </html>
@endsection
