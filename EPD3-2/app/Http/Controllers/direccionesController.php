<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            'street' => 'required|max:40',
            'number' => 'required|max:3',
            'country' => 'required|max:10',
            'city' => 'required|max:15',
            'other_description' => 'required|max:50',
        ]);
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
        $request->validate([
            'street' => 'required|max:40',
            'number' => 'required|max:3',
            'country' => 'required|max:20',
            'city' => 'required|max:20',
            'other_description' => 'max:50',
        ]);
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
