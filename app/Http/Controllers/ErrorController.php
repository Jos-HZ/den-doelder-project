<?php

namespace App\Http\Controllers;

use App\Models\Error;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

// TODO: waarom is het twee keer error.index ipv errors.index?

class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $errors = Error::orderBy('time', 'desc')->get();
        $orders = Order::all();

        return view('errors.index', compact('errors', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Order $order)
    {
        return \view('errors.create', $order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        Error::create($this->validatedError($request));

        return redirect(route('errors.index'));
    }

    /**
     * Validates the Error
     *
     * @param Request $request
     * @return array
     */
    public function validatedError(Request $request)
    {
        return request()->validate([
            'order_id' => 'required',
            'time' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);
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
        $error->update($this->validatedError($request));

        return redirect(route('error.index'));
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

//        return redirect(route('order.index'));
        return redirect(route('error.index'));
    }
}
