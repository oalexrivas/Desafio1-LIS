@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-white bg-dark">
                    <div class="card-header">Menú</div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="{{ route('RegistrarEntrada') }}">
                                    <img src="img/deposito.png" class="img-size-trans" alt="Depositos" title="Depositos">
                                    <h6>Registrar Entrada</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="retiros.html">
                                    <img src="img/retiro.png" class="img-size-trans" alt="Retiros" title="Retiros">
                                    <h6>Registrar Salida</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="#" id="btnSaldo">
                                    <img src="img/VerDepositos.png" class="img-size-trans" alt="Saldo" title="Saldo">
                                    <h6>Ver Entradas</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="#" id="btnSaldo">
                                    <img src="img/VerRetiros.png" class="img-size-trans" alt="Saldo" title="Saldo">
                                    <h6>Ver Salidas</h6>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-1">
                                <a class="mx-auto btn btn-dark stretched-link shadow" href="pago_servicios.html">
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