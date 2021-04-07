<?php

namespace App\Http\Controllers;

use App\ProductList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductList::orderBy('name', 'desc')->get();
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
        $productList = new ProductList();
        $productList->name = $request->productName;
        $productList->save();

        return response('success', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductList  $productList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductList  $productList
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
     * @param  \App\ProductList  $productList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductList  $productList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductList::destroy($id);

        return response('success', Response::HTTP_ACCEPTED);
    }

    public function searchProduct(Request $request)
    {
        // return $request->key;
        $product = ProductList::where('name', 'LIKE', '%' . $request->key . '%')->get();
        return $product;
    }
}
