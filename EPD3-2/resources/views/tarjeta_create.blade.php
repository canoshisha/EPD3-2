@extends('welcome')
@section('title', 'Crear tarjetas')

@section('content')

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Crear tarjeta</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('creditCard.store') }}">
                            @method('get')
                            @csrf

                            <div class="form-group">
                                <label for="titular_tarjeta">Titular de la Tarjeta</label>
                                <input type="text" name="titular_tarjeta" class="form-control" id="titular_tarjeta"
                                    placeholder="Nombre y Apellido">
                                @error('titular_tarjeta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="numero_tarjeta">Número de Tarjeta</label>
                                <input type="number" name="numero_tarjeta" class="form-control" id="numero_tarjeta"
                                    placeholder="xxxxxxxxxxxxxxxx">
                                @error('numero_tarjeta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="fecha_caducidad">Fecha de Caducidad</label>
                                <input type="text" name="fecha_caducidad" class="form-control" id="fecha_caducidad"
                                    placeholder="mm/aa">
                                @error('fecha_caducidad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cvc">CVC</label>
                                <input type="password" name="cvc" class="form-control" id="cvc" placeholder="xxx">
                                @error('cvc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
