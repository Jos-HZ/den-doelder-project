<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Column;
use App\Models\Control;
use App\Models\Order;
use App\Models\PreControl;
use App\Models\Row;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Order $order)
    {
        $categories = Category::all();
        $columns = Column::all();

        $preControl = PreControl::where('order_id', $order->id)->first();
        $rows = Row::where('pre_control_id', $preControl->id)->get();

        return view('controls.create', compact('order', 'columns', 'categories', 'rows', 'preControl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $control = Control::create($this->validatedControl($request));

        $columns_id = Column::pluck('id')->toArray();

        foreach ($columns_id as $id) {
            // variables with correct id
            $correct = 'correct_' . $id;
            $changed_to = 'changed_to_' . $id;
            $comment = 'comment_' . $id;

            DB::table('control_rows')->insert([
                'correct' => $request->$correct,
                'changed_to' => $request->$changed_to,
                'comment' => $request->$comment,
                'control_id' => $control->id,

                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Control  $control
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Control $control, Order $order)
    {
        $categories = Category::all();
        $columns = Column::all();

        $preControl = PreControl::where('order_id', $control->order->id)->first();

        return view('controls.show', compact('control', 'categories', 'columns', 'preControl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function edit(Control $control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control $control)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control $control)
    {
        //
    }

    private function validatedControl(Request $request)
    {
        return $request->validate([
            'order_id' => 'required',
            'treated' => 'required',
            'date' => 'required',
            'submitted_by' => 'required',
            'pre_control_id' => 'required'
        ]);
    }
}
