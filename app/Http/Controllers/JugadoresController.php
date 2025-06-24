<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipos;
use App\Models\Jugadores;
class JugadoresController extends Controller
{
    public function jugadores_index()
    {
        // Cambiar get() por paginate(10) para paginar de a 10 registros
        $datos = Jugadores::orderBy("id", "desc")->paginate(10);
        $equipos = Equipos::get();
        return view("jugadores.index", compact("datos", "equipos"));
    }
    public function jugadores_index_post(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'posicion' => 'required',
            'apodo' => 'required',
            'edad' => 'required',
        ],
        [
            'nombre.required'=>'El campo Nombre está vacío',
            'posicion.required'=>'El campo Posición está vacío',
            'apodo.required'=>'El campo Apodo está vacío',
            'edad.required'=>'El campo Edad está vacío',
            
        ]);

        // Verificar la acción a realizar
        // 1 para crear un nuevo jugador, 2 para actualizar uno existente
        if($request->input('accion')=="1")
        {
            $save=new Jugadores;
            $save->nombre=$request->nombre;
            $save->posicion = $request->posicion;
            $save->apodo = $request->apodo;
            $save->edad = $request->edad;
            $save->equipos_id = $request->equipos_id;
            $save->save();

            return redirect()->route('jugadores_index');
        }

        // Actualizar un jugador existente
        // Se asume que el ID del jugador a actualizar se envía en el request
        // y que la acción es "2"
        // Se busca el jugador por ID y se actualizan sus campos
        // Luego se guarda el modelo actualizado
        // Finalmente, se redirige a la vista de índice de jugadores
        if($request->input('accion')=="2")
        {
            $save= Jugadores::where(['id'=>$request->id])->first();
            $save->nombre=$request->nombre;
            $save->posicion = $request->posicion;
            $save->apodo = $request->apodo;
            $save->edad = $request->edad;
            $save->equipos_id = $request->equipos_id;
            $save->save();

            return redirect()->route('jugadores_index');
        }
    }

    public function jugadores_eliminar(Request $request, $id)
    {
        // Eliminar un jugador por ID
        // Se busca el jugador por ID y se lanza una excepción si no se encuentra
        // Luego se elimina el registro del jugador
        // Finalmente, se redirige a la vista de índice de jugadores
        $datos=Jugadores::where(['id'=>$request->id])->firstOrFail();
        Jugadores::where(['id'=>$request->id])->delete();
        return redirect()->route('jugadores_index');

    }
}

