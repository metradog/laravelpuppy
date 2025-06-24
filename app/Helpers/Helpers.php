<?php 

namespace App\Helpers;


class Helpers
{
 
   //Función para formatear fechas
   // Recibe una fecha en formato 'Y-m-d H:i:s' o 'Y-m-d' y un tipo opcional
  public static function fecha($fechaBruto, $tipo = '')
  {
    // Verificamos si la fechaBruta es un objeto DateTime
    $fechaArray = explode(' ', $fechaBruto);
    $fecha = explode('-', $fechaArray[0]);
    $diaSemana = date("w", mktime(0, 0, 0, $fecha[1], $fecha[2], $fecha[0]));
    // Asignamos el nombre del día de la semana según el número
    // 0 = Domingo, 1 = Lunes, ..., 6 = Sábado
    switch ($diaSemana) {
      case '1':
        $diaSemana = "Lunes";
        break;
      case '2':
        $diaSemana = "Martes";
        break;
      case '3':
        $diaSemana = "Miércoles";
        break;
      case '4':
        $diaSemana = "Jueves";
        break;
      case '5':
        $diaSemana = "Viernes";
        break;
      case '6':
        $diaSemana = "Sábado";
        break;
      case '0':
        $diaSemana = "Domingo";
        break;
    }

    // Asignamos el nombre del mes según el número
    switch ($fecha[1]) {
      case '01':
        $mes = "Enero";
        break;
      case '02':
        $mes = "Febrero";
        break;
      case '03':
        $mes = "Marzo";
        break;
      case '04':
        $mes = "Abril";
        break;
      case '05':
        $mes = "Mayo";
        break;
      case '06':
        $mes = "Junio";
        break;
      case '07':
        $mes = "Julio";
        break;
      case '08':
        $mes = "Agosto";
        break;
      case '09':
        $mes = "Septiembre";
        break;
      case '10':
        $mes = "Octubre";
        break;
      case '11':
        $mes = "Noviembre";
        break;
      case '12':
        $mes = "Diciembre";
        break;
    }

    // Si la fecha es de tipo datetime, separamos la hora
    switch ($tipo) {
      case 'datetime':
        $hora = explode(':', $fechaArray[1]);
        return $diaSemana . ' ' . $fecha[2] . ' de ' . $mes . ' de ' . $fecha[0] . ' a las ' . $hora[0] . ':' . $hora[1] . ':' . $hora[2] . ' ';
        break;
      case 'dte':
        return $fecha[0] . '' . $fecha[1] . '' . $fecha[2];
        break;
      default:
        return $diaSemana . ' ' . $fecha[2] . ' de ' . $mes . ' de ' . $fecha[0];
        break;
    }
  }
}   