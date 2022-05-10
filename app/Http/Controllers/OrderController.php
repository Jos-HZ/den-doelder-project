<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Production;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $orders = Order::all();
        $productions = Production::all();

        return view('orders.index', compact('orders', 'productions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        // need to validate this later
        return redirect(route('orders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return Application|Factory|View
     */
    public function show(Order $order, Request $request)
    {
        if (Auth::check()) {
            return view(str_replace('-ternary-', (Auth::user()->hasRole('driver') ? Auth::user()->role.'.' : ''), 'orders.-ternary-show'), compact('order'));
            // $user = Auth::user();
            // return view(str_replace('-ternary-', (Auth::user()->role === 'driver'
            //     ? 'driver.'
            //     : '')
            //     , 'orders.-ternary-show'), compact('order'));

            // $user = Auth::user();
            // if ($user->hasRole('admin') || $user->hasRole('production')) {
            //     return view('orders.show', compact('order'));
            // } else if ($user->hasRole('driver')) {
            //     return view('orders.driver.show', ['order' => $order, 'user' => $user]);
            // }
        }

        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return Application|Factory|View
     */
    public function edit(Order $order)
    {
        $user = Auth::user();
        // return view('orders.show', ['order' => $order, 'user' => $user]);
        return redirect(route('orders.show', ['order' => $order, 'user' => $user]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Order $order)
    {
        //validate this later
        $order->notes = $request->notes;
        $order->save();
        return redirect(route('orders.show', $order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect(route('orders.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function driverDone(Request $request)
    {
        $order = Order::find($request->id);
        //validate this later
        $order->driver_done = 1;
        $order->save();
        return redirect(route('orders.show', $order));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function productionDone (Request $request)
    {
        $order = Order::find($request->id);
        //validate this later
        $order->production_done = 1;
        $order->save();
        return redirect(route('orders.show', $order));
    }
}
