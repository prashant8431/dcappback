<?php

namespace App\Http\Controllers;

use App\DChallan;
use Illuminate\Http\Request;

class DChallanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DChallan::with('getOrder')->with('company')->paginate(2);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DChallan  $dChallan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DChallan::with('getOrder')->with('company')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DChallan  $dChallan
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
     * @param  \App\DChallan  $dChallan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DChallan  $dChallan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dcList($id)
    {
        return DChallan::where('my_company_id', $id)->with('getOrder')->with('company')->orderBy('id', 'desc')->paginate(50);
    }
}
