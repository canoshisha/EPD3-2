<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Obtener los 4 productos más vendidos
        $productosMasVendidos = DB::table('order_product')
            ->select('product_id', DB::raw('SUM(quantity) as total_vendido'))
            ->groupBy('product_id')
            ->orderByDesc('total_vendido')
            ->limit(4)
            ->get();

        // Obtener los detalles de los productos más vendidos
        $productosDetalles = DB::table('products')
            ->whereIn('id', $productosMasVendidos->pluck('product_id')->toArray())
            ->get();

        // Preparar los datos para el gráfico
        $nombresProductos = [];
        $cantidadesVendidas = [];
        foreach ($productosMasVendidos as $producto) {
            $productoDetalle = $productosDetalles->where('id', $producto->product_id)->first();
            $nombresProductos[] = $productoDetalle->name;
            $cantidadesVendidas[] = $producto->total_vendido;
        }

        $productosMasFavoritos = DB::table('favorites')
            ->select('products_id', DB::raw('COUNT(*) as total_favoritos'))
            ->groupBy('products_id')
            ->orderByDesc('total_favoritos')
            ->limit(5)
            ->get();
        $nombresProductos_fav = [];
        $cantidadFavoritos = [];
        foreach ($productosMasFavoritos as $producto) {
            $productoDetalle = $productosDetalles->where('id', $producto->product_id)->first();
            $nombresProductos_fav[] = $productoDetalle->name;
            $cantidadFavoritos[] = $producto->total_favoritos;
        }

        // Renderizar la vista con los datos
        return view('dashboard', [
            'nombresProductos' => json_encode($nombresProductos),
            'cantidadesVendidas' => json_encode($cantidadesVendidas),
            'nombresProductos_fav' => json_encode($nombresProductos_fav),
            'cantidadFavoritos' => json_encode($cantidadFavoritos)
        ]);
    }
    public function show_user()
    {
        $users = User::paginate(9);
        return view('users', ['users' => $users]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}