<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use App\Models\Address;
use App\Models\ShoppingBasket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{

    public function updateLanguage(Request $request)
{
    $request->validate([
        'language' => 'required|string|in:en,es' // Asegúrate de incluir todos los idiomas soportados aquí
    ]);

    $user = User::where('id', Auth::id())->first();
    $user->language = $request->input('language');
    $user->save();

    return view('home');
}
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
    // Obtener el usuario actualmente autenticado
    $user = User::where('id', Auth::id())->first();

    // Obtener el valor del campo "opcion" del formulario
    $opcion = $request->input('opcion');

    // Actualizar el nombre
    if ($opcion == 'nombre') {
    $nombreNuevo = $request->input('nombre_nuevo');

    // Validar que el nombre no es un email
    if (!filter_var($nombreNuevo, FILTER_VALIDATE_EMAIL)) {
        $user->name = $nombreNuevo;
        $user->save();
        return redirect()->route('perfil.user')->with('success-perfil', 'Nombre actualizado con éxito.');
    } else {
        // El nombre ingresado es un email, mostrar un mensaje de error
        return redirect()->route('edit-menu.user')->withErrors(['mensaje'=> 'El nombre no puede ser un correo electrónico.']);
    }
}
    // Actualizar el correo electrónico
    if ($opcion == 'email') {
        $emailNuevo = $request->input('email_nuevo');
        $correoActual = $user->email;

        // Validar que el correo electrónico nuevo sea una dirección de correo electrónico válida
        $validatedData = $request->validate([
            'email_nuevo' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->email = $emailNuevo;
        $user->save();
        return redirect()->route('perfil.user')->with('success-perfil', 'Email actualizado con éxito.');
    }

    // Actualizar la contraseña
    if ($opcion == 'password') {
        $passwordNuevo = $request->input('password_nuevo');
        $passwordActual = $request->input('password_actual');

        // Verificar que la contraseña actual sea correcta antes de actualizar la contraseña
        if (Hash::check($passwordActual, $user->password)) {
            $user->password = Hash::make($passwordNuevo);
            $user->save();
        }
        return redirect()->route('perfil.user')->with('success-perfil', 'Contraseña actualizada con éxito.');
    }

    // Redirigir a la página de perfil con un mensaje de éxito
    // return redirect()->route('perfil.user')->with('success-perfil', 'Perfil actualizado con éxito.');

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
    // Seleccionar los registros de addresses con el mismo users_id que el usuario que se va a eliminar
    $addresses = Address::where('users_id', $user->id)->get();

    // Borrar los registros de phones
    foreach ($addresses as $address) {
        $address->delete();
    }

    $shopping = ShoppingBasket::where('users_id', $user->id)->first();
    $shopping->delete();

    // Eliminar al usuario
    $user->delete();

    return redirect()->back()->with('success-perfil', 'Usuario eliminado con exito');
}

public function show_menu_user(){
    return view('menu_edit');
}
}