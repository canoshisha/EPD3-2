@extends('welcome')
@section('title',"UPOF1")
@section('scs')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@endsection
@section('contenido')
<div class="container">
    <form method="POST" action="{{route('creditCard.create')}}">
        @method('get')
        @csrf
    
        <div class="form-group">
            <label for="titular_tarjeta">Titular de la Tarjeta</label>
            <input type="text" name="titular_tarjeta" class="form-control" id="titular_tarjeta" placeholder="Nombre y Apellido">
        </div>
    
        <div class="form-group">
            <label for="numero_tarjeta">Número de Tarjeta</label>
            <input type="number" name="numero_tarjeta" class="form-control" id="numero_tarjeta" placeholder="xxxx-xxxx-xxxx-xxxx">
        </div>
    
        <div class="form-group">
            <label for="fecha_caducidad">Fecha de Caducidad</label>
            <input type="text" name="fecha_caducidad" class="form-control" id="fecha_caducidad" placeholder="mm/aa">
        </div>
    
        <div class="form-group">
            <label for="cvc">CVC</label>
            <input type="password" name="cvc" class="form-control" id="cvc" placeholder="xxx">
        </div>
    
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>


@endsection