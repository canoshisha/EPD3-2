<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
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
    public function create(Request $request)
    {
        $category = new Category();
        $type = strtolower($request->input('type')); // Convertir a minúsculas

        if (!Category::whereRaw('lower(type) = ?', [$type])->exists()) {
            $type = ucwords($type); // Convertir la primera letra de cada palabra en mayúscula
            $category->type = $type;
            $category->save();
        }
        return redirect()->back()->with('success-perfil', 'Categoría creada con exito.');
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
    public function show($id)
    {
        //
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
        $category = Category::findOrFail($id); // encontrar la categoría a actualizar
        $type = $request->input('type'); // establecer el nuevo valor para el tipo
        $type = ucwords($type); // Convertir la primera letra de cada palabra en mayúscula
        $category->type = $type;
        $category->save();


        $category->save(); // guardar los cambios en la base de datos

        return redirect()->back()->with('success-perfil', 'Categoría actualizada con éxito.');; // redirigir al listado de categorías
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success-perfil', 'Categoría eliminada con éxito.');;
    }
}