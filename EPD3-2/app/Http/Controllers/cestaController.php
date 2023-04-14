<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\productBasket;
use App\Models\Products;
use App\Models\ShoppingBasket;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

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
        $productBasket = new ProductBasket();
        $productBasket->size = $request->input('talla');
        $productBasket->cantidad = $request->input('cantidad');
        $productBasket->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingBasket  $shoppingBasket
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        // $user = User::where('id', Auth::id())->first();
        $shoppingBasket = ShoppingBasket::where('users_id', Auth::id())->first();

        
        // $shopping_basket = DB::table('product_baskets')->where('shopping_basket_id', $shoppingBasket->id )->get();
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
    public function addProductB(Request $request)
    {
        $shopping_basket = ShoppingBasket::where('users_id', Auth::id())->first();
        $productBasket = new ProductBasket();     
        $productBasket->size = $request->input('talla');
        $productBasket->cantidad = $request->input('cantidad');
        $productBasket->product_id = $request->input('product_id');
        $productBasket->shopping_basket_id = $shopping_basket->id;
        $productBasket->save();
        


        return redirect()->route('inicio');


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
        $shoppingBasket = ShoppingBasket::where('users_id', Auth::id())->first();
        // dd($shoppingBasket);
        $fechaActual = Carbon::now();
        $order = new Order();
        $order->pagement = 'online';
        $order->date = $fechaActual;
        $order->state = 'enviado';
        $order->users_id = $shoppingBasket->users_id;
        foreach ($shoppingBasket->productBasket as $productB) {
           $order->products()->attach($productB->product_id);
        }
        
        // $order->products()->createMany($productData);
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
