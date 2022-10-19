@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-white bg-dark">
                    <div class="card-header">Registrar Entradas</div>

                    <div class="card-body">
                        <form id="frmTransaccion">
                            <div class="form-group col-12 col-md-3">
                                <label class="text-light" for="cmbtiposmovs">Tipo de Movimiento</label>
                                <select  type="select" class="form-control" id="cmbtiposmovs" name="cmbtiposmovs">
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label class="text-light" for="txtfecha">Fecha</label>
                                <input type="date" class="form-control" id="txtfecha" name="txtfecha"></input>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label class="text-light" for="monto">Monto</label>
                                <input type="number" class="form-control" id="txtMonto" placeholder="Monto" min="0.01"
                                    step="0.01" onkeypress="return onlyNumberKeyAndPoint(event);"></input>
                            </div>
                            <div class="form-group">
                                <label for="loadFile">Factura</label>
                                <input type="file" class="form-control-file" id="loadFile">
                            </div>
                            <div class="form-group ">
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-secondary" id="btnGuardar"
                                        value="Depositar"></input>
                                    <input type="button" class="btn btn-outline-light"
                                        onclick="window.location.href = '{{ route('home') }}';" value="Volver"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
