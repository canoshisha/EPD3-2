@extends('auth.template')
@section('title', 'Crear tarjetas')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Crear tarjeta</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('creditCard.create') }}">
                            @method('get')
                            @csrf

                            <div class="form-group">
                                <label for="titular_tarjeta">Titular de la Tarjeta</label>
                                <input type="text" name="titular_tarjeta" class="form-control" id="titular_tarjeta"
                                    placeholder="Nombre y Apellido">
                            </div>

                            <div class="form-group">
                                <label for="numero_tarjeta">Número de Tarjeta</label>
                                <input type="number" name="numero_tarjeta" class="form-control" id="numero_tarjeta"
                                    placeholder="xxxxxxxxxxxxxxxx">
                            </div>

                            <div class="form-group">
                                <label for="fecha_caducidad">Fecha de Caducidad</label>
                                <input type="text" name="fecha_caducidad" class="form-control" id="fecha_caducidad"
                                    placeholder="mm/aa">
                            </div>

                            <div class="form-group">
                                <label for="cvc">CVC</label>
                                <input type="password" name="cvc" class="form-control" id="cvc" placeholder="xxx">
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('creditCard.read') }}" class="btn btn-danger col-4 mx-auto">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
