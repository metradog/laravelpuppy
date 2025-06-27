<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipos; 
use App\Models\Jugadores; 

class EquiposController extends Controller
{
    public function equipos_index()
    {
       // Obtiene todos los equipos de la base de datos
       $datos_equipos = Equipos::orderBy('id', 'desc')->get();

       return view('equipos.index', compact('datos_equipos'));
    }

    
    public function equipos_index_post(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
        ],
        [
            'nombre.required'=>'El campo Nombre está vacío'
        ]);
        
        // Verifica si la acción es 1 (crear) o 2 (editar)
        if($request->input('accion')=="1")
        {
            $save=new Equipos;
            $save->nombre=$request->nombre;
            $save->save();

            return redirect()->route('equipos_index')
                ->with('css', 'success')
                ->with('mensaje', 'Se creó el registro Equipo exitosamente');
        }

        if($request->input('accion')=="2")
        {
            $save= Equipos::where(['id'=>$request->id])->first();
            $save->nombre=$request->nombre;
            $save->save();

            return redirect()->route('equipos_index')
                ->with('css', 'success')
                ->with('mensaje', 'Se modificó el registro Equipo exitosamente');
        }
    }

    public function equipos_eliminar(Request $request, $id)
    {
        $datos = Equipos::where(['id'=>$id])->firstOrFail();
        $existe = Jugadores::where(['equipos_id'=>$id])->count();
        if ($existe == 0) {
            Equipos::where(['id'=>$id])->delete();
            return redirect()->route('equipos_index')
                ->with('css', 'success')
                ->with('mensaje', 'Se eliminó el registro exitosamente');
        } else {
            return redirect()->route('equipos_index')
                ->with('css', 'danger')
                ->with('mensaje', 'No se pudo eliminar el registro');
        }
    }
    
}
// End of EquiposController.php
