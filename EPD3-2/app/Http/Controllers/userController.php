<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class userController extends Controller
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
    public function update(Request $request)
    {
        $user = auth()->user();

        switch ($request->opcion) {
            case 'nombre':
                $user->name = $request->nombre_nuevo;
                break;
            case 'email':
                $validator = Validator::make($request->all(), [
                    'email_actual' => 'required|email',
                    'email_nuevo' => 'required|email|unique:users,email,'.$user->id,
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }

                if ($user->email !== $request->email_actual) {
                    return back()->withErrors(['email_actual' => 'El email actual no coincide con el registrado'])->withInput();
                }

                $user->email = $request->email_nuevo;
                break;
            case 'password':
                $validator = Validator::make($request->all(), [
                    'password_actual' => 'required',
                    'password_nuevo' => 'required|min:8|confirmed',
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }

                if (!Hash::check($request->password_actual, $user->password)) {
                    return back()->withErrors(['password_actual' => 'La contraseña actual no coincide con la registrada'])->withInput();
                }

                $user->password = Hash::make($request->password_nuevo);
                break;
        }

        $user->save();

        return redirect()->route('perfil.index')->with('success', 'Perfil actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
{
    // Seleccionar los registros de phones con el mismo users_id que el usuario que se va a eliminar
    $phones = Phone::where('users_id', $user->id)->get();

    // Borrar los registros de phones
    foreach ($phones as $phone) {
        $phone->delete();
    }

    // Eliminar al usuario
    $user->delete();

    return redirect()->back();
}

public function show_menu_user(){
    return view('menu_edit');
}
}