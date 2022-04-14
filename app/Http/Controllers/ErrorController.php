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
use Illuminate\Support\Facades\DB;

// TODO: waarom is het twee keer error.index ipv errors.index?

class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $errors = Error::filter($request)->get();
        $orders = Order::all();

        return view('errors.index', compact('errors', 'orders'));
    }

//    public function index (Request $request)
//    {
//        return Error::filter($request)->get();
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
//        return \view('errors.create', ['order' => DB::table('orders')->where('id', $order_id)->first()]);

        return \view('errors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        Error::create($this->validatedError($request));

        return redirect(route('error.index'));
    }

    /**
     * Validates the Error
     *
     * @param Request $request
     * @return array
     */
    public function validatedError(Request $request): array
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
