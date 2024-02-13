<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ActualiteRepository;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $actualiteRepository;
    public function __construct(ActualiteRepository $actualiteRepository)
    {
        $this->actualiteRepository = $actualiteRepository;
    }
    public function index()
    {
        $actualites = Actualite::all();
        return view('actualite.index', compact("actualites"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $actualites = Actualite::all();

        if (Auth::user()->can('actualite-create')) {
            return view('actualite.create', compact('actualites'));
        }


        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->actualiteRepository->store($request);
        return redirect()->route('actualite.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Actualite $actualite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actualite $actualite)
    {
        $actualites = Actualite::all();

        if (Auth::user()->can('actualite-update')) {
            return view('actualite.edit', compact('actualite', 'actualites'));
        }

        abort(401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actualite $actualite)
    {
        $this->actualiteRepository->update($request, $actualite);
        return redirect()->route('actualite.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actualite $actualite)
    {
        //
    }
}
