<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\UsersMetadata; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login_index()
    {
        // Aquí puedes agregar la lógica que necesites para la página de inicio de sesión
        // Por ejemplo, podrías obtener datos de la base de datos o realizar alguna otra acción

        // Retorna una vista llamada 'login/index.blade.php' (debes crear esta vista en resources/views/login/index.blade.php)
        return view('login.index');
    }

    public function login_index_post(Request $request)
    {
       $validate = $request->validate(
        [
            'correo' => 'required|email:rfc,dns',
            'password' => 'required|min:6',
        ],
        [
            'correo.required' => 'El campo correo es obligatorio.',
            'correo.email' => 'El correo debe ser un correo electrónico válido.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
         ]
    
    );
     
    // die(Hash::make($request->input('password')));   


    // Obtiene los datos del formulario de inicio de sesión
    if(Auth::attempt(['email' => $request->input('correo'), 'password' => $request->input('password')]))
    {
        $usuario = UsersMetadata::where('users_id', Auth::id())->first();

        $request->session()->put('users_metadata_id', $usuario->id);
        $request->session()->put('perfiles_id', $usuario->perfiles_id);        
        $request->session()->put('perfiles', $usuario->perfiles->nombre);
        
        return redirect()->intended('/'); // Redirige a la ruta por defecto o a la ruta que se haya especificado en el middleware de autenticación
        
        
        //echo $usuario;exit;

        // Si la autenticación es exitosa, redirige al usuario a la página de inicio
        return redirect()->route('home_index');  

    }
    else
    {
        return redirect()->route('login_index')->withErrors(['error' => 'Credenciales incorrectas.']);
    }

        // Aquí puedes agregar la lógica para autenticar al usuario
        // Por ejemplo, podrías usar Auth::attempt() para verificar las credenciales

        // Si la autenticación es exitosa, redirige al usuario a la página de inicio
        // return redirect()->route('home_index');

        // Si la autenticación falla, redirige de nuevo a la página de inicio de sesión con un mensaje de error
        // return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas.']); 

    }

    public function login_salir(Request $request)
    {
        // Cierra la sesión del usuario
        Auth::logout();

        // Limpia los datos de sesión relacionados con el usuario
        $request->session()->forget(['users_metadata_id', 'perfiles_id', 'perfiles']);

        // Redirige al usuario a la página de inicio de sesión o a la página que desees
        return redirect()->route('login_index')->with('success', 'Has cerrado sesión correctamente.');
    }
    
}
