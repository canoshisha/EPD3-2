<?php

namespace App\Http\Controllers;

use App\Models\ShoppingBasket;
use Illuminate\Http\Request;

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
    public function destroy(ShoppingBasket $shoppingBasket)
    {

    }
}
