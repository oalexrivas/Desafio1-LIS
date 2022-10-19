<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tiposmovimientos;

class EntradasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tipos = Tiposmovimientos::all();

        return view('Entradas', ['tipos' => $tipos]);
    }

    public function guardarRegistro()
    {
        $tipos = Tiposmovimientos::all();

        return view('Entradas', ['tipos' => $tipos]);
    }
}