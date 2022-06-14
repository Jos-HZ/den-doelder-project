<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductionLine;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //    TODO: validation

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $orders = Order::all();
        $productions = ProductionLine::all();

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

        return redirect(route('orders.show'));
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
            return view(str_replace('-ternary-', (Auth::user()->hasRole('driver') ? Auth::user()->role . '.' : ''), 'orders.-ternary-show'), compact('order'));
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
        $order->driver_done = 1;
        $order->save();
        return redirect(route('orders.show', $order));
    }

   public function resolved(Request $request)
   {
       $order = Order::find($request->id);
       $order->resolved_at = now();
       $order->save();
       return redirect(route('orders.show', $order));
   }
}
