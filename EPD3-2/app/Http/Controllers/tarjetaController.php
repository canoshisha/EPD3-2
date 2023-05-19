<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CreditCard;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        return view('tarjeta_create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'titular_tarjeta' => 'required|max:50|regex:/^[^\d]*$/',
            'numero_tarjeta' => 'required|digits:16',
            'fecha_caducidad' => 'required|regex:/^\d{2}\/\d{2}$/',
            'cvc' => 'required|digits:3',
        ],
        ['titular_tarjeta.required' => 'El campo Titular de la Tarjeta es obligatorio y no debe tener ningun número.',
        'titular_tarjeta.max' => 'El campo Titular de la Tarjeta no puede tener más de 60 caracteres.',
        'titular_tarjeta.regex' => 'El campo Titular de la Tarjeta no debe tener ningun número.',
        'numero_tarjeta.required' => 'El campo Número de Tarjeta es obligatorio y debe tener 16 dígitos.',
        'numero_tarjeta.digits' => 'El campo Número de Tarjeta debe tener 16 dígitos.',
        'fecha_caducidad.required' => 'El campo Fecha de caducidad es obligatorio y debe tener formato mes/año.',
        'fecha_caducidad.regex' => 'El campo Fecha de caducidad debe tener formato mes/año.',
        'cvc.required' => 'El campo CVC es obligatorio.',
        'cvc.digits' => 'El campo CVC debe tener 3 dígitos.'] );

        

        $user = User::where('id', Auth::id())->first();
        $tarjeta = new CreditCard;
        $tarjeta->users_id = $user->id;
        $tarjeta->numero_tarjeta = $request->numero_tarjeta;
        $tarjeta->fecha_caducidad = $request->fecha_caducidad;
        $tarjeta->CVC = $request->cvc;
        $tarjeta->save();
        return redirect('/home')->with('success-perfil', 'La tarjeta se ha creado correctamente');
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
    public function edit(CreditCard $tarjeta)
    {
        return view('tarjeta_edit',compact('tarjeta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditCard $tarjeta)
    {

        $validated = $request->validate([
            'numero_tarjeta' => 'required|digits:16',
            'fecha_caducidad' => 'required|regex:/^\d{2}\/\d{2}$/',
            'cvc' => 'required|digits:3',
        ],
        ['numero_tarjeta.required' => 'El campo Número de Tarjeta es obligatorio y debe tener 16 dígitos.',
        'numero_tarjeta.digits' => 'El campo Número de Tarjeta debe tener 16 dígitos.',
        'fecha_caducidad.required' => 'El campo Fecha de caducidad es obligatorio y debe tener formato mes/año.',
        'fecha_caducidad.regex' => 'El campo Fecha de caducidad debe tener formato mes/año.',
        'cvc.required' => 'El campo CVC es obligatorio.',
        'cvc.digits' => 'El campo CVC debe tener 3 dígitos.'] );

        $tarjeta->numero_tarjeta = $request->numero_tarjeta;
        $tarjeta->fecha_caducidad = $request->fecha_caducidad;
        $tarjeta->CVC = $request->cvc;
        $tarjeta->save();

        return redirect('/home')->with('mensaje', 'La tarjeta se ha editado correctamente.');
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
        // dd($tarjeta);
        $pedidos = Order::where('credit_cards_id',$tarjeta->id)->get();
        $puede=True;
        foreach ($pedidos as $pedido ) {
            if($pedido->state !='entregado'){
                $puede = False;
            }else{
                $tickets = Ticket::where('orders_id', $pedido->id)->get();

                // Borrar los registros de phones
                foreach ($tickets as $ticket) {
                    $ticket->delete();
                }

                $pedido->delete();
            }
        }

        if($puede){
            $tarjeta->delete();
            return redirect('/home')->with('success-perfil', 'La tarjeta se ha eliminado correctamente.');
        }else{
             return redirect('/home')->with('success-perfil', 'La tarjeta no se ha eliminado correctamente.');
        }

    }
}