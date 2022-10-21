@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-white bg-dark">
                    <div class="card-header">Registrar Entradas</div>
                    <div class="card-body">
                        <div class="col-12">
                            <h2>{{ $mensaje }}</h2>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-3 col-12">
                                <div class="float-right">
                                    <input type="button" class="btn btn-outline-light"
                                        onclick="window.location.href = '{{ route('home') }}';" value="Volver"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
