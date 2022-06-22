<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Checklist;
use App\Models\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;


class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $checklist = Checklist::filter($request->all())->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $order = DB::table('orders')
            ->where('ordernumber', '=', request()->ordernumber)
            ->first();
        return view('checklist.create',['order' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->input('name_21'));

        Checklist::create($this->validatedChecklist($request));
$test = [];
        for($i = 1;$i<=21;$i++)
        {
            array_push( $test,$request->input("name_$i"));

        }
//     dd($request);
        foreach ($test as $name)
        {
            dd($name);
            Rubric::create($this->validatedRubric($name));
        }


        return redirect(route('orders.show', $request->order_id));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Checklist $checklist
     * @return \Illuminate\Http\Response
     */
    public function show(Checklist $checklist)
    {
        return view('checklist.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Checklist $checklist
     * @return \Illuminate\Http\Response
     */
    public function edit(Checklist $checklist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Checklist $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checklist $checklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Checklist $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checklist $checklist)
    {
        //
    }

    private function validatedChecklist(Request $request){
        return $request->validate([
            'palletname' => 'required',
            'ordernumber' => 'required|numeric|gt:0',
            'HT/nonHT' => 'required|string',
            'date'=>'required|date',
            'location'=>'required|string',
            'controllername'=>'required|string',
            'order_id'=>'required'
        ]);
    }

    private function validatedRubric(Request $request){
        return $request->validate([
            'name' => 'required',
            'checklist_id'=>'required'
        ]);
    }
}


