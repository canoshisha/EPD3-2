<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Favorites;
use App\Models\ImgProducts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            'categories' => 'required',
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
        foreach($categorias as $categoria)
        {
            $categoryBBDD = Category::where('type',$categoria)->first();
            $productBBDD = Products::where('name',$request->name)->first();
            $aux2 = new CategoryProduct();
            $aux2->product_id = $productBBDD->id;
            $aux2->category_id = $categoryBBDD->id;
            $aux2->save();
        }
        

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
        $product = Products::where('id',$id)->first();
        $categorias = $product->category;
        $todasCategorias = Category::all();
        return view('productos_edit',compact('product','categorias','todasCategorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required|max:120',
            'categories' => 'required',
            'price' => 'required|max:4',
            'stock' => 'required|max:3',
            'description' => 'required|max:120',
        ]);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();



        $categorias = array_reverse($request->input('categories'),True);
        
        $categoryProducts = $product->category;
        
            foreach($categoryProducts as $categoryProduct)
            {
                
                if(!empty($categorias)){
                    foreach($categorias as $aux)
                    {
                        
                        if($aux == $categoryProduct->type)
                        {
                            array_pop($categorias);
                            break;
                        
                        }
                    }
                    
                }else
                {
                    $aux2 = CategoryProduct::where('product_id', $product->id)->where('category_id',$categoryProduct->id)->first();
                    $aux2->delete();
                }
                
    
            }
            

            while(count($categorias) >= 1)
            {
                $categoria = array_pop($categorias);
                $categoryBBDD = Category::where('type',$categoria)->first();
                $aux2 = new CategoryProduct();
                $aux2->product_id = $product->id;
                $aux2->category_id = $categoryBBDD->id;
                $aux2->save();
            }
            
        

        return redirect()->route('admin.products')->with('mensaje','La modificación del producto ha sido un éxito.');
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

    public function toggleFavorite(Products $product)
{
    $user = User::find(Auth::id());
    // $favorite = Favorites::where('products_id', $product->id)->where('users_id', $user->id)->first();
    $favorite = $user->favorites()->where('products_id', $product->id)->first();
    if ($favorite) {
        $favorite->delete();
    } else {
        $new_favorite = new Favorites();
        $new_favorite->products_id = $product->id;
        $new_favorite->users_id = $user->id;
        $new_favorite->save();
    }
    return redirect()->back();

    // $user = User::find(Auth::id());
    // if ($user->favorites()->where('products_id', $product->id)->exists()) {
    //     $user->favorites()->detach($product->id);
    // } else {
    //     $user->favorites()->attach($product->id);
    // }
    // return redirect()->back();
}

public function showFavorites()
{
    $user = User::find(Auth::id());
    $favorites = $user->favorites;
    $products = [];
    foreach ($favorites as $favorite){
        $product = Products::find($favorite->products_id);
        $products[] = $product;
    }
    $imgProducts = DB::table('img_products')->where('tipo', 'imagenMenu')->get();


    return view('favorites', compact('products','imgProducts'));
}

}