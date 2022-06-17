<?php

namespace App\Http\Controllers;

use App\Models\Placement;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $placements = Placement::all();

        return view('placement.index', compact('placements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        $order = DB::table('orders')
            ->where('ordernumber', '=', request()->ordernumber)
            ->first();

        return view('placement.create', ['order' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        Placement::create($this->validatedPlacement($request));

        return redirect(route('placement.index'));
    }

    /**
     * Validates the Placement
     *
     * @param Request $request
     * @return array
     */
    public function validatedPlacement(Request $request): array
    {
        return request()->validate([
            'placement' => 'required',
            'addition' => 'nullable',
            'description' => 'required',
            'quantity' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Placement $placement
     * @return Application|Factory|View
     */
    public function show(Placement $placement)
    {
        return view('placement.show', compact('placement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Placement $placement
     * @return Application|Factory|View
     */
    public function edit(Placement $placement)
    {
        return view('placement.edit', compact('placement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Placement $placement
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Placement $placement)
    {
        $placement->update($this->validatedPlacement($request));

        return redirect(route('placement.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Placement $placement
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Placement $placement)
    {
        $placement->delete();

        return redirect(route('placement.index'));
    }
}
