<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShoppingBasket;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;

class cestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ShoppingBasket  $shoppingBasket
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingBasket $shoppingBasket)
    {
        return view('cesta',compact('shoppingBasket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingBasket  $shoppingBasket
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingBasket $shoppingBasket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShoppingBasket  $shoppingBasket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppingBasket $shoppingBasket)
    {

        $productId = $request->input("product_id"); // id del producto que deseas eliminar
        $productsIds = array_diff($shoppingBasket->products_id, [$productId]);
        $shoppingBasket->products()->sync($productsIds);
        return redirect()->route('cesta.show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingBasket  $shoppingBasket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $shoppingBasket = $request->input("shoppingBasket");
        $fechaActual = Carbon::now();
        $order = new Order();
        $order->pagement = 'online';
        $order->date = $fechaActual;
        $order->state = 'enviado';
        $order->users_id = $shoppingBasket->users_id;
        $order->products_id = $shoppingBasket->products_id;

        $order->save();

        $ticket = new Ticket();
        $ticket->price_total = $shoppingBasket->calcularTotal();
        $ticket->date = $fechaActual;
        $ticket->orders_id = $order->id;
        $ticket->save();

        $shoppingBasket->delete();
        return redirect()->route('inicio');


    }
}
