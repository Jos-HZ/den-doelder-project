<?php

namespace App\Http\Controllers;

use App\Models\Error;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $errors = Error::all();
        $orders = Order::all();

        return view('errors.index', compact('errors', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view('errors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        return redirect(route('errors.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Error $error
     * @return Application|Factory|View
     */
    public function show(Error $error)
    {
        return view('errors.show', compact('error'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Error $error
     * @return Application|Factory|View
     */
    public function edit(Error $error)
    {
        return view('errors.edit', compact('error'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Error $error
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Error $error)
    {
        return redirect(route('orders.show', $error));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Error $error
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Error $error)
    {
        $error->delete();

        return redirect(route('orders.index'));
    }
}
