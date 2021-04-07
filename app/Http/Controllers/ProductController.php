<?php

namespace App\Http\Controllers;

use App\DChallan;
use App\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::with('order')->get();
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $addr = $request->nameAddr;
        $arr  = array();
        foreach ($request->values as $val) {
            $product = Product::find($val['id']);

            $arr[] = [
                'name' => $product->name,
                'descri' => $val['descri'],
                'qty' => $val['qty'],
                'remarks' => $val['remarks'],
            ];

            Product::where('id', $val['id'])->decrement('qty', $val['qty']);
        }
        // return $arr;
        $challan = new DChallan;
        $challan->my_company_id = $request->mycompany_id;
        $challan->company_id = $addr['company']['id'];
        $challan->work_id = $addr['id'];
        $challan->item_list = json_encode($arr);
        $challan->save();

        return response($challan->id, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
