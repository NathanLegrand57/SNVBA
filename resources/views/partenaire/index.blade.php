@extends('layouts.app')

@section('content')

    <body>
        @can('partenaire-create')
            <x-create-button property="partenaire" />
        @endcan
        @forelse ($partenaires as $partenaire)
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">{{ 'Nom du partenaire' }} : {{ $partenaire->libelle }}</h5>
                    @can('partenaire-update')
                        <x-update-button property="partenaire" :model="$partenaire" />
                    @endcan
                </div>
            </div>
        @empty
            <p class="ms-3">
                Aucun partenaire connu
            </p>
        @endforelse
    </body>

    </html>
@endsection
