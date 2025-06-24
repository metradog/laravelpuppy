<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home_index()
    {
        // Aquí puedes agregar la lógica que necesites para la página de inicio
        // Por ejemplo, podrías obtener datos de la base de datos o realizar alguna otra acción

        // Retorna una vista llamada 'home/index.blade.php' (debes crear esta vista en resources/views/home/index.blade.php)
        return view('home.index');
    }
}
