<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statistics;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistics = Statistics::all()->toArray();
        return view('layout', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'model_A'   =>  'required',
            'model_B'   =>  'required',
            'model_C'   =>  'required',
            'model_D'   =>  'required'
        ]);

        $statistics = new Statistics([
            'model_A'   =>  $request->get('model_A'),
            'model_B'   =>  $request->get('model_B'),
            'model_C'   =>  $request->get('model_C'),
            'model_D'   =>  $request->get('model_D')
        ]);

        $statistics->save();
        return redirect()->route('layout');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
