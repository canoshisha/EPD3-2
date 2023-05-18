<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\SizeProduct;
use App\Models\Size;
use App\Models\Favorites;
use App\Models\ImgProducts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Products::orderBy('id','desc')->paginate(9);
        $imgProducts = DB::table('img_products')->where('tipo', 'imagenMenu')->get();
        return view('productos', compact('products','imgProducts'));
    }

    public function viewDisconunt()
    {

        $products = Products::orderBy('id','desc')->paginate(9);
        $imgProducts = DB::table('img_products')->where('tipo', 'imagenMenu')->get();
        return view('descuentos', compact('products','imgProducts'));
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
        $rules = [
            'name' => 'required|max:700',
            'categories' => 'required',
            'price' => 'required|max:5',
            'discount'=>'required|max:2',
            'talla' => 'required',
            'stock' => 'required',
            'description' => 'required|max:700',
            'imagen' => 'required',
        ];
        $messages = [
            'name.required' => 'El campo Nombre del producto es obligatorio.',
            'categories.required' => 'El campo Categorias del producto es obligatorio.',
            'price.required' => 'El campo Precio es obligatorio y numérico.',
            'discount.required'=>'El campo Discount es obligatorio. Puede ser un 0.',
            'description.required' => 'El campo Descripción del producto es obligatorio.',
            'talla.required' => 'El campo Talla del producto es obligatorio.',
            'stock.required' => 'El campo stock del producto es obligatorio y numérico.',
            'imagen.required' => 'El campo imagen del producto es obligatorio.',

        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('product.create')->withErrors($validator)->withInput();
        }
        $product = new Products();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->discount = $request->discount;
        $product->save();
        $tallas = $request->input('talla');
        $stocks = $request->input('stock');

        $productBBDD = Products::where('name',$request->name)->first();

        if ($request->hasFile('imagen')) {
            $tiposImagenes = $request->tipoImagen;
            $images = $request->file('imagen');
            for($i = 0; $i < count($images); $i++){
                $imageName = $images[$i]->getClientOriginalName();
                $path = public_path('img');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $images[$i]->move($path, $imageName);

                $imgProduct = new ImgProducts();
                $imgProduct->routeImg = '/img/'.$imageName;
                $imgProduct->tipo = $tiposImagenes[$i];
                $imgProduct->products_id = $productBBDD->id;
                $imgProduct->save();
            }

        }

        for($i = 0; $i < count($tallas); $i++)
        {

            $sizeProduct = new SizeProduct();
            $sizeBBDD = Size::where('size',$tallas[$i])->first();
            $sizeProduct->size_id = $sizeBBDD->id;
            $sizeProduct->product_id = $productBBDD->id;
            $sizeProduct->stock = $stocks[$i];
            $sizeProduct->save();
        }


        $categorias = $request->input('categories');
        foreach($categorias as $categoria)
        {
            $categoryBBDD = Category::where('type',$categoria)->first();

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
        $product_sizes = SizeProduct::where('product_id', $product->id)->get();
        $sizes = [];

        foreach($product_sizes as $size_product) {
            if($size_product->stock>0){
            $size= DB::table('sizes')->where('id', $size_product->size_id)->first();
            $sizes[] = $size;
            }
        }

        return view('product_des',compact('product','imgProduct','sizes'));
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
        $rules = [
            'name' => 'required|max:800',
            'categories' => 'required',
            'price' => 'required|max:5',
            'discount'=>'required|max:2',
            'description' => 'required|max:800',
        ];
        $messages = [
            'name.required' => 'El campo Nombre del producto es obligatorio y menor que 800 caracteres.',
            'categories.required' => 'El campo Categorias del producto es obligatorio.',
            'price.required' => 'El campo Precio es obligatorio y numérico.',
            'discount.required'=>'El campo Discount es obligatorio. Puede ser un 0.',
            'description.required' => 'El campo Descripción del producto es obligatorio y menor que 800 caracteres.',

        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('product.edit', $product->id)->withErrors($validator)->withInput();
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->discount = $request->discount;
        $product->save();



        $categorias = $request->input('categories');
        $categoryProducts = $product->category;
            foreach($categoryProducts as $categoryProduct)
            {
                if(!empty($categorias)){
                    foreach($categorias as $aux)
                    {

                        if($aux == $categoryProduct->type)
                        {
                            $aux2 = array_search($aux,$categorias);

                            // unset($categorias[$aux2]);
                            $categorias = array_diff($categorias, array($aux));

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
        $relacionProduct = CategoryProduct::where('product_id',$id)->get();
        foreach($relacionProduct as $aux){
            $aux->delete();
        }

        $imagenesProduct = ImgProducts::where('products_id',$id)->get();
        foreach($imagenesProduct as $img){
            $img->delete();
        }

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