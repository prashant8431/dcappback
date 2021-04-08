<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Order::with('company')->get();
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
        // return $request->mycompanyId;
        // return $request['type'];
        $order = new Order;
        $order->order_no = $request->orderNo;
        $order->type = $request->type;
        $order->my_company_id = $request->mycompanyId;
        $order->company_id = $request->companyId;
        $order->order_date = $request->orderDate;
        $order->status = 'In Progress';
        $order->save();

        $products = $request->partArr;
        foreach ($products as $pro) {
            $product = new Product;
            $product->workId = $order->id;
            $product->name = $pro['partName'];
            $product->qty = $pro['qty'];
            $product->save();
        }

        return response('success', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('company')->find($id);
        $product = Product::where('workId', $id)->get();
        return [$order, $product];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('workId', $id)->delete();
        Order::destroy($id);

        return response('success', Response::HTTP_ACCEPTED);
    }

    public function orderList($id)
    {

        return Order::where('my_company_id', $id)->with('company')->orderBy('id', 'desc')->paginate(50);
    }
}
