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
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;


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
        return view('cesta', compact('shoppingBasket'));
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
        $datos = $request->validate(
            [
                'talla' => 'required|in:S,M,L,XL XXL,XXXL',
                'cantidad' => 'required|in:1,2,3,4,5,6,7,8,9,10'
            ]
        );
        $shopping_basket = ShoppingBasket::where('users_id', Auth::id())->first();

        $enCesta = False;
        foreach ($shopping_basket->productBasket as $productB) {
            if ($productB->product_id == $request->input('product_id')) {
                $enCesta = True;
                $productB->cantidad = $request->input('cantidad') + $productB->cantidad;
                $productB->save();
                break;
            }
        }
        if (!$enCesta) {
            $productBasket = new ProductBasket();
            $productBasket->size = $request->input('talla');
            $productBasket->cantidad = $request->input('cantidad');
            $productBasket->product_id = $request->input('product_id');
            $productBasket->shopping_basket_id = $shopping_basket->id;
            $productBasket->save();
        }







        return redirect()->route('products.menu')->with('mensaje', 'Se ha introducido el producto en la cesta');


    }
    public function misPedidos(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $orders = Order::where('users_id',$user->id)->paginate(3);
        return view('mispedidos', compact('orders'));


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShoppingBasket  $shoppingBasket
     * @return \Illuminate\Http\Response
     */
    public function updateCantidad(Request $request, ShoppingBasket $shoppingBasket)
    {
        $cantidad = $request->input("cantidad");

        if ($cantidad == 0) {
            $productId = $request->input("productB_id"); // id del producto que deseas eliminar
            $productB = productBasket::find($productId);
            $productB->delete(); // Eliminar el producto correspondiente a la ID

        }
        else{
            $productId = $request->input("productB_id"); // id del producto que deseas eliminar
            $productB = productBasket::find($productId);
            $stock = $productB->product->stock - $cantidad;
            if ($stock < 0) {
                return redirect()->route('cesta.show')->withErrors(['mensaje' => 'El producto ' . $productB->product->name . ' no dispone de más stock']);

            }else{
                $productId = $request->input("productB_id"); // id del producto que deseas eliminar
                $productB->cantidad = $request->input("cantidad"); // Eliminar el producto correspondiente a la ID
                $productB->save();

            }
        }

        return redirect()->route('cesta.show');


    }
    public function update(Request $request, ShoppingBasket $shoppingBasket)
    {



        $productId = $request->input("productB_id"); // id del producto que deseas eliminar
        $productB = productBasket::find($productId);
        $productB->delete(); // Eliminar el producto correspondiente a la ID

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

        foreach ($shoppingBasket->productBasket as $productB) {

            $stock = $productB->product->stock - $productB->cantidad;
            if ($stock < 0) {
                return redirect()->route('cesta.show')->withErrors(['mensaje' => 'El producto ' . $productB->product->name . ' no tiene suficiente stock para la venta, retirelo de la cesta']);

            }
        }

        $fechaActual = Carbon::now();
        $order = new Order();
        $order->pagement = 'online';
        $order->date = $fechaActual;
        $order->state = 'enviado';
        $order->users_id = $shoppingBasket->users_id;
        $order->save();
        foreach ($shoppingBasket->productBasket as $productB) {

            $productB->product->stock = $productB->product->stock - $productB->cantidad;
            $productB->product->save();
            $order->products()->attach($productB->product_id, ['quantity' => $productB->cantidad, 'size' => $productB->size]);


        }




        $ticket = new Ticket();
        $ticket->price_total = $shoppingBasket->calcularTotal();
        $ticket->date = $fechaActual;
        $ticket->orders_id = $order->id;
        $ticket->save();

        $shoppingBasket->delete();

        $user = User::where('id', Auth::id())->first();

        Mail::to(Auth::user()->email)->send(new OrderConfirmation($user, $order, $ticket));

        return redirect()->route('inicio')->with('mensaje', 'Pedido realizado con éxito');



    }
}
