@extends('layouts.app')

@section('content')

    <body>
        @forelse ($actualites as $actualite)
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">{{ 'Titre de l\'actualite' }} : {{ $actualite->titre }}</h5>
                    <p class="card-title">{{ 'TContenu de l\'actualite' }} : {{ $actualite->contenu }}</p>
                    @can('actualite-update')
                        <x-update-button property="actualite" :model="$actualite" />
                    @endcan
                </div>
            </div>
        @empty
            <p class="ms-3">
                Aucune actualite connue
            </p>
        @endforelse
    </body>

    </html>
@endsection
