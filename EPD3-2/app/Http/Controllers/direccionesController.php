<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class direccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $addresses = Address::where('users_id',$user->id)->paginate(3);
        return view('address_read', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address_create');
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
            'street' => 'required|max:40',
            'number' => 'required|numeric|min:0',
            'country' => 'required|max:15',
            'city' => 'required|max:15',
            'other_description' => 'required|max:50',
        ],
        ['street.required' => 'El campo calle es obligatorio.',
        'street.max' => 'El campo Calle no puede tener más de 40 caracteres.',
        'number.required' => 'El campo Número es obligatorio.',
        'number.min' => 'El campo Número no puede ser negativo.',
        'country.required' => 'El campo país es obligatorio.',
        'country.max' => 'El campo País no puede tener más de 15 caracteres.',
        'city.required' => 'El campo ciudad es obligatorio.',
        'city.max' => 'El campo Ciudad no puede tener más de 15 caracteres.',
        'other_description.required' => 'El campo Otra descripción es obligatorio.',
        'other_description.max' => 'El campo Otra descripción no puede tener más de 50 caracteres.',
        ] );
        $user = User::where('id', Auth::id())->first();
        $address = new Address;
        $address->street = $request->street;
        $address->number = $request->number;
        $address->country = $request->country;
        $address->city = $request->city;
        $address->other_description = $request->other_description;
        $address->users_id = $user->id;
        $address->save();
        return redirect()->route('address.read')->with('mensaje','La creación de la dirección ha sido un éxito.');
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
    public function edit(Address $address)
    {
        return view('address_edit',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $validated = $request->validate([
            'street' => 'required|max:40',
            'number' => 'required|numeric|min:0',
            'country' => 'required|max:15',
            'city' => 'required|max:15',
            'other_description' => 'required|max:50',
        ],
        ['street.required' => 'El campo calle es obligatorio.',
        'street.max' => 'El campo Calle no puede tener más de 40 caracteres.',
        'number.required' => 'El campo Número es obligatorio.',
        'number.min' => 'El campo Número no puede ser negativo.',
        'country.required' => 'El campo país es obligatorio.',
        'country.max' => 'El campo País no puede tener más de 15 caracteres.',
        'city.required' => 'El campo ciudad es obligatorio.',
        'city.max' => 'El campo Ciudad no puede tener más de 15 caracteres.',
        'other_description.required' => 'El campo Otra descripción es obligatorio.',
        'other_description.max' => 'El campo Otra descripción no puede tener más de 50 caracteres.',
        ] );


        $address->street = $request->street;
        $address->number = $request->number;
        $address->country = $request->country;
        $address->city = $request->city;
        $address->other_description = $request->other_description;
        $address->save();
        return redirect()->route('address.read')->with('mensaje','La modificación de la dirección ha sido un éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $orders = Order::where('addresses_id',$id)->get();
        foreach ($orders as $order ) {
            $tickets = Ticket::where('orders_id', $order->id)->get();
            // Borrar los registros de tickets
            foreach ($tickets as $ticket) {
                $ticket->delete();
            }
            $order->delete();
        }
        $address->delete();
        if(Auth::user()->is_admin)
        {
        return redirect()->route('admin.addresses')->with('mensaje','La eliminación de la dirección ha sido un éxito.');
        }else
        {
        return redirect()->route('address.read')->with('mensaje','La eliminación de la dirección ha sido un éxito.');
        }

    }
}