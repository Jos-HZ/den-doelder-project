<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\QualityControl;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class
QualityControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Order $order
     * @return Application|Factory|View
     */
    public function index(Order $order): View|Factory|Application
    {
        $qualities = QualityControl::all()->sortDesc();

        $qualities = $qualities->where('order_id', $order->id);

        return view('qualityControl.index', compact('qualities', 'order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        QualityControl::create($this->validateQuality($request));

        return redirect(route('qualityControl.index', $request->order_id));
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

        return view('qualityControl.create', ['order' => $order]);
    }

    /**
     * Validates the qualityControl
     *
     * @param Request $request
     * @return array
     *
     */
    public function validateQuality(Request $request): array
    {
        return request()->validate([
            'name_pallet' => 'required',
            'time' => 'required',
            'def_nr' => 'present',
            'action' => 'present',
            'deviation' => 'present',
            'extra_info' => 'present',
            'order_id' => 'required',
//            TODO: set to required
            'production_line_id' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param QualityControl $qualityControl
     * @return Application|Factory|View
     */
    public function show(QualityControl $qualityControl)
    {
        return view('qualityControl.show', compact('qualityControl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param QualityControl $qualityControl
     * @return Application|Factory|View
     */
    public function edit(QualityControl $qualityControl)
    {
        return view('qualityControl.edit', compact('qualityControl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param QualityControl $qualityControl
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, QualityControl $qualityControl)
    {
        $qualityControl->update($this->validateQuality($request));

        return redirect(route('qualityControl.index', $request->order_id));
    }
}
