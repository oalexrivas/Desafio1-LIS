<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Tiposmovimientos;
use App\Movimientos;
use Redirect;

class RegistrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function entradas()
    {
        $tipos = Tiposmovimientos::all();

        return view('registros', ['tipos' => $tipos, 'tipomov'=>1]);
    }

    public function salidas()
    {
        $tipos = Tiposmovimientos::all();

        return view('registros', ['tipos' => $tipos, 'tipomov'=>0]);
    }

    public function verEntradas()
    {
        $movs = Movimientos::where('tipo', 1)->with('tiposmovimientos')->get();

        return view('movimientos', ['movs' => $movs, 'tipomov'=>1]);
    }

    public function verSalidas()
    {
        $movs = Movimientos::where('tipo', 0)->with('tiposmovimientos')->get();

        return view('movimientos', ['movs' => $movs, 'tipomov'=>0]);
    }

    public function reporte()
    {
        $movsEntradas = Movimientos::where('tipo', 1)
                        ->groupBy('idTipo')
                        ->selectRaw('sum(monto) as total, idTipo')
                        ->get();


        $movsSalidas = Movimientos::where('tipo', 0)
                        ->groupBy('idTipo')
                        ->selectRaw('idTipo, sum(monto) as total')
                        ->get();

        $resumenMovs = Movimientos::groupBy('tipo')
                        ->selectRaw('tipo, sum(monto) as total')
                        ->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        
        //Grafica
        $array[] = ['Tipo Movimiento', 'Montos'];
        foreach($resumenMovs as $key => $value)
        {
          $array[++$key] = [$value->tipo, $value->total];
        }
        
        $pdf->loadView('impresion', ['entradas'=>$movsEntradas, 'salidas'=>$movsSalidas, 'course'=>json_encode($array)]);

        return $pdf->stream();
    }

    public function guardarRegistro()
    {
        $max = Movimientos::max('id') + 1;
        $target_dir = 'adjuntos/' . $max . '/';
        if(!is_dir($target_dir))
            mkdir($target_dir);
        $target_file = $target_dir . basename($_FILES['loadFile']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $message = '';

        // Check if image file is a actual image or fake image
        if (isset($_POST['submit'])) {
            $check = getimagesize($_FILES['loadFile']['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $message = 'El archivo no es una imagen.';
                $uploadOk = 0;
            }
        } 

        // Check if file already exists
        if (file_exists($target_file)) {
            $message = 'El archivo seleccionado ya existe.';
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES['loadFile']['size'] > 3000000) {
            $message = 'El archivo supera los 3Mb.';
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
            $message = 'Solo se permiten los archivos JPG, JPEG, PNG & GIF.';
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return Redirect::back()->withErrors($message);
        } else {
            if (move_uploaded_file($_FILES['loadFile']['tmp_name'], $target_file)) {
                $movimiento = new Movimientos;
                $movimiento->idTipo = $_POST['cmbtiposmovs'];
                $movimiento->tipo = $_POST['tipomov'];
                $movimiento->monto = $_POST['txtMonto'];
                $movimiento->fecha = $_POST['txtfecha'];
                $movimiento->Adjunto = htmlspecialchars(basename($_FILES['loadFile']['name']));
                
                $movimiento->save();
                
                $resultado = 'Registro guardado correctamente!';

                return view('registrado', ['mensaje' => $resultado]);
            } else {
                $message = 'Ha habido un error mientras se guardaba el archivo adjunto.';
                return Redirect::back()->withErrors($message);
            }
        }
    }
} 