<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\QualityControl;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class QualityControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $qualities = QualityControl::all();

        return view('qualityControl.index', compact('qualities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('qualityControl.create');
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

        return redirect(route('qualityControl.index'));
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

        return redirect(route('qualityControl.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param QualityControl $qualityControl
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(QualityControl $qualityControl)
    {
        $qualityControl->delete();

        return redirect(route('qualityControl.index'));
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
            'extra_info' => 'required',
            'action' => 'required',
            'deviation' => 'required',
            'ordernumber' => 'required'
        ]);
    }
}
