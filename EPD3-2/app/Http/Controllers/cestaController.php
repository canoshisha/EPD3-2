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
use App\Models\Address;
use App\Models\CreditCard;
use App\Models\Size;
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
        $tarjetas = CreditCard::where('users_id', Auth::id())->get();
        $direcciones = Address::where('users_id', Auth::id())->get();
        // $shopping_basket = DB::table('product_baskets')->where('shopping_basket_id', $shoppingBasket->id )->get();
        return view('cesta', compact('shoppingBasket','tarjetas','direcciones'));
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
                'talla' => 'required|in:S,M,L,XL,XXL,XXXL',
                'cantidad' => 'required|in:1,2,3,4,5,6,7,8,9,10'
            ],
            ['talla.required' => 'El campo talla es obligatorio.',
            'talla.in' => 'Debe seleccionar un valor en el campo Talla.',
            'cantidad.required' => 'El campo Cantidad del producto es obligatorio.',
            'cantidad.in' => 'Debe seleccionar un valor en el campo Cantidad.',]);

        $shopping_basket = ShoppingBasket::where('users_id', Auth::id())->first();
        $size = Size::where('size', $request->input('talla'))->first();
        $talla_id = $size->id;

        $enCesta = False;
        foreach ($shopping_basket->productBasket as $productB) {
            if ($productB->product_id == $request->input('product_id') && $productB->size ==$size->size) {
                $enCesta = True;
                $product = Products::find($productB->product_id);

                if($request->input('cantidad') + $productB->cantidad > $product->stock_act($talla_id)){
                    $queda = $product->stock_act($talla_id) - $productB->cantidad;
                    return redirect()->route('producto.descripcion',$product)->withErrors(['mensaje' => 'No hay suficiente stock, con lo de la cesta solo quedan '.$queda]);
                }

                $productB->cantidad = $request->input('cantidad') + $productB->cantidad;
                $productB->save();
                break;
            }
        }
        if (!$enCesta) {
            $product = Products::find($request->input('product_id'));
            if($request->input('cantidad') > $product->stock_act($talla_id)){

                return redirect()->route('producto.descripcion',$product)->withErrors(['mensaje' => 'No hay suficiente stock, con lo de la cesta solo quedan '.$product->stock_act($talla_id)]);
            }
            $productBasket = new ProductBasket();
            $productBasket->size = $size->size;
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

        foreach ($orders as $order) {
            $user = User::find($order->users_id);
            $addres = Address::find($order->addresses_id);
            $credit_card = CreditCard::find($order->credit_cards_id);
            $order->user = $user;
            $order->address = $addres;
            $order->credit_cards = $credit_card;
        }
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
            $size = Size::where('size', $request->input('talla'))->first();
            $talla_id = $size->id;

            $stock = $productB->product->stock_act($talla_id) - $cantidad;
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
        $request->validate([
            'tarjeta' => 'required',
            'direccion' => 'required',
        ]);
        $shoppingBasket = ShoppingBasket::where('users_id', Auth::id())->first();

        foreach ($shoppingBasket->productBasket as $productB) {
            $size = Size::where('size', $productB->size)->first();
            $talla_id = $size->id;
            $stock = $productB->product->stock_act($talla_id) - $productB->cantidad;
            if ($stock < 0) {
                return redirect()->route('cesta.show')->withErrors(['mensaje' => 'El producto ' . $productB->product->name . ' no tiene suficiente stock para la venta, retirelo de la cesta']);

            }
        }

        $fechaActual = Carbon::now();
        $order = new Order();
        $order->credit_cards_id = $request->input("tarjeta");
        $order->addresses_id = $request->input("direccion");
        $order->date = $fechaActual;
        $order->state = 'entregado';
        $order->users_id = $shoppingBasket->users_id;
        $order->save();
        foreach ($shoppingBasket->productBasket as $productB) {
            $size = Size::where('size', $productB->size)->first();
            $talla_id = $size->id;
            $sizeProduct = $productB->product->sizeProduct($talla_id);
            $sizeProduct->stock = $sizeProduct->stock - $productB->cantidad;
            $sizeProduct->save();
            $order->products()->attach($productB->product_id, ['quantity' => $productB->cantidad, 'size' => $productB->size]);


        }




        $ticket = new Ticket();
        $ticket->price_total = $shoppingBasket->calcularTotalDiscount();
        $ticket->date = $fechaActual;
        $ticket->orders_id = $order->id;
        $ticket->save();

        $shoppingBasket->delete();
        //falla aqui no se por que
        $user = User::where('id', Auth::id())->first();
        // dd($fechaActual->toDateString());
        $order_good=Order::where('users_id',Auth::id())->where('date',$fechaActual->toDateString())->first();
        Mail::to(Auth::user()->email)->send(new OrderConfirmation($user,$order_good,$ticket));

        return redirect()->route('inicio')->with('mensaje', 'Pedido realizado con éxito');



    }
}