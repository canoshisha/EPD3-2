<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CreditCard;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class tarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $tarjeta = CreditCard::where('users_id',$user->id)->first();
        return view('tarjeta_read', compact('tarjeta')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  


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
            'titular_tarjeta' => 'required',
            'numero_tarjeta' => 'required|digits:16',
            'fecha_caducidad' => 'required|regex:/^\d{2}\/\d{2}$/',
            'cvc' => 'required|digits:3',
        ]);
        $user = User::where('id', Auth::id())->first();
        $tarjeta = new CreditCard;
        $tarjeta->users_id = $user->id;
        $tarjeta->numero_tarjeta = $request->numero_tarjeta;
        $tarjeta->fecha_caducidad = $request->fecha_caducidad;
        $tarjeta->CVC = $request->cvc;
        $tarjeta->save();
        return redirect('/home')->with('mensaje', 'La tarjeta se ha creado correctamente');
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
        $user = User::where('id', Auth::id())->first();
        $tarjeta = CreditCard::where('users_id',$user->id)->first();
        $tarjeta->delete();
        return redirect('/home')->with('mensaje', 'La tarjeta se ha eliminado correctamente.');
    }
}
