@extends('welcome')
@section('title', 'Tarjetas')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Información Tarjeta de Crédito</h1>
                    </div>

                    <div class="card-body">

                        @if ($tarjeta == null)
                            <p>No tiene ninguna tarjeta registrada.</p>
                            <a href="{{ route('creditCard.create') }}" class="btn btn-danger col-4 mx-auto">Crear Tarjeta</a>
                        @else
                            <div class="card" style="width: 18rem;">
                                <img src="{{ URL::asset('/img/visa-dual.png') }}" class="card-img-top"
                                    alt="imagen tarjeta Visa">
                                <div class="card-body">
                                    <h5 class="card-title">Tarjeta de credito #{{ $tarjeta->id }}</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong>Número de la tarjeta:</strong>
                                            {{ $tarjeta->numero_tarjeta }}
                                        </li>
                                        <li class="list-group-item"><strong>Fecha de caducidad:
                                            </strong>{{ $tarjeta->fecha_caducidad }}
                                        </li>
                                    </ul>

                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <a href="{{ route('creditCard.delete', $tarjeta->id) }}"
                                        class="btn btn-danger mr-2">Eliminar Tarjeta</a>
                                    <a class="btn btn-primary" href="{{ route('creditCard.edit', $tarjeta) }}">Editar
                                        tarjeta</a>
                                </div>

                            </div>
                        @endif
                        <a href="{{ url('/home') }}" class="btn btn-primary btn-fit-content ">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection
