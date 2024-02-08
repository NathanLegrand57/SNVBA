<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PartenaireRepository;
use App\Http\Requests\PartenaireRequest;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $partenaireRepository;
    public function __construct(PartenaireRepository $partenaireRepository)
    {
        $this->partenaireRepository = $partenaireRepository;
    }
    public function index()
    {
        $partenaires = Partenaire::all();
        return view('partenaire.index', compact('partenaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits = Partenaire::all();

        if (Auth::user()->can('partenaire-create')) {
            return view('partenaire.create', compact('produits'));
        }
        // return view('partenaire.create', compact('produits'));


        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartenaireRequest $request, Partenaire $partenaire)
    {
        $this->partenaireRepository->store($request);
        return redirect()->route('partenaire.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Partenaire $partenaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partenaire $partenaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partenaire $partenaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partenaire $partenaire)
    {
        //
    }
}
