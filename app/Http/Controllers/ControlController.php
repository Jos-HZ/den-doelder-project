<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Column;
use App\Models\Control;
use App\Models\ControlRow;
use App\Models\Order;
use App\Models\PreControl;
use App\Models\Row;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ControlController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $control = Control::create($this->validatedControl($request));

        $columns = Column::all();

//        dd($request);

        for ($i=0; $i < count($columns); $i++) {
            // variables with correct id
            $correct = 'correct_' . $i;
            $changed_to = 'changed_to_' . $i;
            $comment = 'comment_' . $i;
            $column_id = 'column_id_' . $i;

            DB::table('control_rows')->insert([
                'correct' => $request->$correct,
                'changed_to' => $request->$changed_to,
                'comment' => $request->$comment,
                'column_id' => $request->$column_id,
                'control_id' => $control->id,

                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect(route('orders.show', $control->order_id));
    }

    private function validatedControl(Request $request)
    {
        return $request->validate([
            'order_id' => 'required',
            'treated' => 'required',
            'date' => 'required',
            'submitted_by' => 'required',
            'pre_control_id' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return Application|Factory|View
     */
    public function show(Order $order)
    {
        $categories = Category::all();
        $columns = Column::all();

        $pre_control = PreControl::where('order_id', $order->id)->first();
        $control = Control::where('order_id', $order->id)->first();


        $rows = Row::where('pre_control_id', $pre_control->id)->get();
        $controlRows = ControlRow::where('control_id', $control->id)->get();

        return view('controls.show', compact('order', 'categories', 'columns', 'rows', 'controlRows', 'pre_control', 'control'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Control $control
     * @return Response
     */
    public function edit(Control $control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Control $control
     * @return Response
     */
    public function update(Request $request, Control $control)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Control $control
     * @return Response
     */
    public function destroy(Control $control)
    {
        //
    }
}
