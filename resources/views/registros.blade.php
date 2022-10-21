@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-white bg-dark">
                    <div class="card-header">Registrar {{ $tipomov == 1 ? 'Entrada' : 'Salida' }} </div>
                    <div class="card-body">
                        <form class="needs-validation" id="frmTransaccion" action="registrado" method="post"
                            enctype="multipart/form-data" novalidate>
                            <input type="hidden" name="tipomov" value="{{ $tipomov }}" />
                            <div class="row form-group">
                                <div class="col-lg-4 col-12">
                                    <label class="text-light" for="cmbtiposmovs">Tipo de Movimiento</label>
                                    <select type="select" class="form-control" name="cmbtiposmovs">
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <label class="text-light" for="txtfecha">Fecha</label>
                                    <input type="date" class="form-control" name="txtfecha" value="{{ date('Y-m-d') }}"
                                        required></input>
                                    <div class="invalid-feedback">
                                        Debe colocar una fecha.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <label class="text-light" for="monto">Monto</label>
                                    <input type="number" class="form-control" name="txtMonto" placeholder="Monto"
                                        min="0.01" step="0.01" required
                                        onkeypress="return onlyNumberKeyAndPoint(event);"></input>
                                    <div class="invalid-feedback">
                                        Debe colocar un monto.
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-8 col-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Factura</span>
                                        </div>
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="loadFile">Seleccione una imagen</label>
                                            <input type="file" class="custom-file-input" id="loadFile" name="loadFile"
                                                aria-describedby="inputGroupFileAddon01"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-lg-3 col-12">
                                    <div class="float-right">
                                        <input type="submit" class="btn btn-primary" id="btnGuardar"
                                            value="{{ $tipomov == 1 ? 'Depositar' : 'Retirar' }}"></input>
                                        <input type="button" class="btn btn-outline-light"
                                            onclick="window.location.href = '{{ route('home') }}';" value="Volver"></input>
                                    </div>
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="py-4 container fixed-bottom">
                                    {!! implode(
                                        '',
                                        $errors->all(
                                            '<div id="mensajeValidaciones" class="alert alert-danger" role="alert">:message<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>',
                                        ),
                                    ) !!}
                                </div>
                            @endif

                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            bsCustomFileInput.init();

            if (!$('#mensajeValidaciones').is(':empty')) {
                $("#mensajeValidaciones").fadeTo(2000, 500).slideUp(500, function() {
                    $("#mensajeValidaciones").slideUp(500);
                });
            }
        });

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
