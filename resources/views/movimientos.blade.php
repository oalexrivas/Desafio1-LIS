@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-white bg-dark">
                    <div class="card-header">Movimientos de {{ $tipomov == 1 ? 'Entrada' : 'Salida' }}</div>
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <div class="col-lg-3 col-12">
                                <div class="float-right">
                                    <input type="button" class="btn btn-outline-light"
                                        onclick="window.location.href = '{{ route('home') }}';" value="Volver"></input>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-dark table-striped table-hover mt-2">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:10%">Cod. Movimiento</th>
                                        <th scope="col" style="width:20%">Tipo</th>
                                        <th scope="col" style="width:25%">Fecha</th>
                                        <th scope="col" style="width:20%">Monto</th>
                                        <th scope="col" style="width:25%">Factura</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movs as $mov)
                                        <tr>
                                            <th scope="row">{{ $mov->id }}</th>
                                            <td>{{ $mov->tiposmovimientos->nombre }}</td>
                                            <td>{{ (new DateTimeImmutable($mov->fecha))->format('d-m-Y') }}</td>
                                            <td>{{ $mov->monto }}</td>
                                            <td class="mx-auto"><img data-enlargable class="w-50 rounded"
                                                    style='cursor:zoom-in;'
                                                    src="/adjuntos/{{ $mov->id . '/' . $mov->Adjunto }}"></img></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            $('img[data-enlargable]').addClass('img-enlargable').click(function() {
                var src = $(this).attr('src');
                $('<div>').css({
                    background: 'RGBA(0,0,0,.5) url(' + encodeURIComponent(src) + ') no-repeat center',
                    backgroundSize: 'contain',
                    width: '100%',
                    height: '100%',
                    position: 'fixed',
                    zIndex: '10000',
                    top: '0',
                    left: '0',
                    cursor: 'zoom-out'
                }).click(function() {
                    $(this).remove();
                }).appendTo('body');
            });
        });
    </script>
@endsection
