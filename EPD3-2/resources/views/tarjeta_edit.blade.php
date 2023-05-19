@extends('welcome')
@section('title', 'UPOF1')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar tarjeta</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('creditCard.update', $tarjeta) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="numero_tarjeta">Número de Tarjeta</label>
                                <input type="number" name="numero_tarjeta" class="form-control" id="numero_tarjeta"
                                    value="{{ $tarjeta->numero_tarjeta }}">
                                @error('numero_tarjeta')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="fecha_caducidad">Fecha de Caducidad</label>
                                <input type="text" name="fecha_caducidad" class="form-control" id="fecha_caducidad"
                                    value="{{ $tarjeta->fecha_caducidad }}">
                                @error('fecha_caducidad')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cvc">CVC</label>
                                <input type="password" name="cvc" class="form-control" id="cvc"
                                    value="{{ $tarjeta->CVC }}">
                                @error('cvc')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('creditCard.read') }}" class="btn btn-danger ">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
