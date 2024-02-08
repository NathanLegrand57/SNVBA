<?php

namespace App\Http\Repositories;

use App\Models\Actualite;

class ActualiteRepository
{
    protected $actualite;

    // public function store($request)
    // {
    // $data = $request->all();

    // $actualite = new Actualite;
    // $actualite->titre = $data['titre'];
    // $actualite->contenu = $data['contenu'];

    // $actualite->save();
    // }

    public function update($request, $actualite)
    {
        $data = $request->all();

        $actualite->titre = $data['titre'];
        $actualite->contenu = $data['contenu'];

        $actualite->save();
    }
}
