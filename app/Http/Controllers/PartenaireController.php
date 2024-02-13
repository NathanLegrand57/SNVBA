<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PartenaireRepository;
use App\Http\Requests\PartenaireRequest;
use App\Mail\SuggestUpdatePartenaire;
use App\Mail\UpdatePartenaire;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
        $partenaires = Partenaire::all();

        if (Auth::user()->can('partenaire-create')) {
            return view('partenaire.create', compact('partenaires'));
        }


        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartenaireRequest $request, Partenaire $partenaire)
    {
        $this->partenaireRepository->store($request);
        Mail::to('admin@gmail.com')->send(new SuggestUpdatePartenaire($partenaire));
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
        $partenaires = Partenaire::all();

        if (Auth::user()->can('partenaire-update')) {
            return view('partenaire.edit', compact('partenaire', 'partenaires'));
        }

        abort(401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartenaireRequest $request, Partenaire $partenaire)
    {
        $this->partenaireRepository->update($request, $partenaire);

        $email = (new UpdatePartenaire($partenaire))->with([
            'partenaire' => $partenaire,
        ]);
        Mail::to($partenaire->email)->send(new UpdatePartenaire($partenaire));

        return redirect()->route('partenaire.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partenaire $partenaire)
    {
        if (Auth::user()->can('partenaire-delete')) {
            $partenaire->delete();
            return redirect()->route('partenaire.index');
        }
        abort(401);
    }
}
