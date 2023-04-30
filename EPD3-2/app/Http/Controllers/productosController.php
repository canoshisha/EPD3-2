<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\ImgProducts;
use Illuminate\Support\Facades\DB;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $products = Products::paginate(9);
        $imgProducts = DB::table('img_products')->where('tipo', 'imagenMenu')->get();
        return view('productos', compact('products','imgProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();
        return view('productos_create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:120',
            'price' => 'required|max:4',
            'stock' => 'required|max:3',
            'description' => 'required|max:120',
        ]);
        $product = new Products();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->discount = $request->discount;
        $product->save();

        $categorias = $request->input('categories');
        $categoryBBDD = Category::where('type',$categorias)->get();
        dd($categoryBBDD);
        $productBBDD = Products::where('name',$request->name)->first();
        foreach($categorias as $categoria)
        $aux2 = new CategoryProduct();
        $aux2->product_id = $productBBDD->id;
        $aux2->category_id = $categoria->id;
        $aux2->save();

        return redirect()->route('admin.products')->with('mensaje','La creación del producto ha sido un éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        $id = $product->id;
        $imgProduct = DB::table('img_products')->where('products_id', $id)->get();
        return view('product_des',compact('product','imgProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find('id',$id)->get();
        return view('productos_edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:120',
            'price' => 'required|digits:4',
            'stock' => 'required|digits:3',
            'description' => 'required|max:120',
        ]);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();
        //return

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relacionProduct = CategoryProduct::where('product_id',$id)->first();
        $relacionProduct->delete();
        $product = Products::where('id',$id)->first();
        $product->delete();
        return redirect()->route('admin.products')->with('mensaje','La eliminación del producto ha sido un éxito.');
    }
}
