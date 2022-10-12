<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function mostrar()
    {
        echo '<br/>';
        echo '<center><h1>Hemos llegado desde la ruta, al metodo mostrar del controller</h1></center>';
    }

    public function suma($num1, $num2)
    {
        $resultado = $num1 + $num2;

        echo '<br/>';
        echo "<center><h1>El resultado de la suma es: $resultado</h1></center>";
    }

    public function perfiles()
    {
        # code...
    }
}
