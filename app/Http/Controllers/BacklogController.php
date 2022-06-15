<?php

namespace App\Http\Controllers;

use App\Models\Backlog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class BacklogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $backlogs = Backlog::filter($request->all())->get();

        return view('backlogs.index', compact('backlogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        Backlog::create($this->validatedBacklog($request));

        return redirect(route('orders.show', $request->order_id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('backlogs.create');
    }

    /**
     * Validates the Backlog
     *
     * @param Request $request
     * @return array
     */
    public function validatedBacklog(Request $request): array
    {
        return request()->validate([
            'order_id' => 'required',
            'time' => 'required',
            'date' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Backlog $backlog
     * @return Application|Factory|View
     */
    public function show(Backlog $backlog): Application|Factory|View
    {
        return view('backlogs.show', compact('backlog'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Backlog $backlog
     * @return Application|Factory|View
     */
    public function edit(Backlog $backlog): View|Factory|Application
    {
        return view('backlogs.edit', compact('backlog'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Backlog $backlog
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Backlog $backlog)
    {
        $backlog->update($this->validatedBacklog($request));

        return redirect(route('orders.show', $backlog->order_id));
    }

    // change resolved_at to now()
    public function resolve(Backlog $backlog)
    {
        if ($backlog->resolved_at === null) {
            $backlog->resolved_at = now();
            $backlog->save();
        }
        return redirect(route('orders.show', $backlog->order_id));
    }
}
