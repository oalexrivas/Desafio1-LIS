@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-white bg-dark">
                    <div class="card-header">Bienvenido a Control de Finanzas</div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('RegistrarEntrada') }}">
                                    <img src="img/deposito.png" class="img-size-trans" alt="Depositos" title="Depositos">
                                    <h6>Registrar Entrada</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('RegistrarSalida') }}">
                                    <img src="img/retiro.png" class="img-size-trans" alt="Retiros" title="Retiros">
                                    <h6>Registrar Salida</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('VerEntradas') }}">
                                    <img src="img/VerDepositos.png" class="img-size-trans" alt="Saldo" title="Saldo">
                                    <h6>Ver Entradas</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('VerSalidas') }}">
                                    <img src="img/VerRetiros.png" class="img-size-trans" alt="Saldo" title="Saldo">
                                    <h6>Ver Salidas</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('reporte') }}">
                                    <img src="img/Saldo.png" class="img-size-trans" alt="Saldo" title="Saldo">
                                    <h6>Mostrar Balance</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- @section('footer')
    <div  id="alertaHome" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none;">
        <span id="mensajeAlerta">{{ isset($mensaje) ? $mensaje : "" }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endsection -->

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            bsCustomFileInput.init();

            // if (!$('#mensajeAlerta').is(':empty')) {
            //     $("#alertaHome").fadeTo(2000, 500).slideUp(500, function() {
            //         $("#alertaHome").slideUp(500);
            //     });
            // }
        });
    </script>
@endsection