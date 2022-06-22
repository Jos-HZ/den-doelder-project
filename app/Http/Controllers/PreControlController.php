<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\PreControl;
use App\Models\Row;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PreControlController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $columns_id = Column::pluck('id')->toArray();
        return view('pre-controls.create', compact('columns_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
                // TODO: give right pre_control id
                'pre_control_id' => $pre_control->id,

                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
