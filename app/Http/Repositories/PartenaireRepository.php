<?php

namespace App\Http\Repositories;

use App\Models\Partenaire;

class PartenaireRepository
{
    protected $partenaire;

    public function store($request)
    {
        $data = $request->all();

        $partenaire = new Partenaire;
        $partenaire->libelle = $data['libelle'];

        $partenaire->save();
    }

    public function update($request, $partenaire)
    {
        $data = $request->all();

        $partenaire->libelle = $data['libelle'];

        $partenaire->save();
    }
}
