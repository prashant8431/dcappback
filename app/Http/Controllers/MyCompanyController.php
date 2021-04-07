<?php

namespace App\Http\Controllers;

use App\MyCompany;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MyCompany::all();
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
        $newCompany = new MyCompany();
        $newCompany->name = $request->name;
        $newCompany->address = $request->address;
        $newCompany->contact_no = $request->contact;
        $newCompany->gstin = $request->gstin;
        $newCompany->save();

        return response('sucess', Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MyCompany  $myCompany
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return MyCompany::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MyCompany  $myCompany
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
     * @param  \App\MyCompany  $myCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MyCompany  $myCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
