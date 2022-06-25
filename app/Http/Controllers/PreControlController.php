<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Column;
use App\Models\Order;
use App\Models\PreControl;
use App\Models\Row;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreControlController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $pre_control = PreControl::create($this->validatedPreControl($request));

        $columns_id = Column::pluck('id')->toArray();

        foreach ($columns_id as $id) {
            // variables with correct id
            $correct = 'correct_' . $id;
            $changed_to = 'changed_to_' . $id;
            $treated = 'treated_' . $id;
            $humidity = 'humidity_' . $id;
            $column_id = 'column_id_' . $id;

            DB::table('rows')->insert([
                'correct' => $request->$correct,
                'changed_to' => $request->$changed_to,
                'treated' => $request->$treated,
                'humidity' => $request->$humidity,
                'column_id' => $request->$column_id,
                'pre_control_id' => $pre_control->id,

                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect(route('orders.show', $pre_control->order_id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Order $order)
    {
        $categories = Category::all();
        $columns = Column::all();
        return view('pre-controls.create', compact('order', 'columns', 'categories'));
    }

    private function validatedPreControl(Request $request)
    {
        return $request->validate([
            'order_id' => 'required',
            'treated' => 'required',
            'date' => 'required',
            'submitted_by' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Order $order)
    {
        $categories = Category::all();
        $columns = Column::all();

        $pre_control = PreControl::where('order_id', $order->id)->first();

        $rows = Row::where('pre_control_id', $pre_control->id)->get();

        return view('pre-controls.show', compact('order', 'categories', 'columns', 'rows', 'pre_control'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
