<?php

namespace App\Http\Controllers;

use App\Models\QualityControl;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QualityControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('qualityControl.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QualityControl  $qualityControl
     * @return Response
     */
    public function show(QualityControl $qualityControl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QualityControl  $qualityControl
     * @return Response
     */
    public function edit(QualityControl $qualityControl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QualityControl  $qualityControl
     * @return Response
     */
    public function update(Request $request, QualityControl $qualityControl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QualityControl  $qualityControl
     * @return Response
     */
    public function destroy(QualityControl $qualityControl)
    {
        //
    }
}
