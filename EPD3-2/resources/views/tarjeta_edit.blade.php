@extends('welcome')
@section('title',"UPOF1")
@section('scs')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@endsection
@section('contenido')
<div class="container">
    <form method="POST" action="{{route('creditCard.update',$tarjeta)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="numero_tarjeta">Número de Tarjeta</label>
            <input type="number" name="numero_tarjeta" class="form-control" id="numero_tarjeta" value="{{$tarjeta->numero_tarjeta}}">
        </div>
    
        <div class="form-group">
            <label for="fecha_caducidad">Fecha de Caducidad</label>
            <input type="text" name="fecha_caducidad" class="form-control" id="fecha_caducidad" value="{{$tarjeta->fecha_caducidad}}">
        </div>
    
        <div class="form-group">
            <label for="cvc">CVC</label>
            <input type="password" name="cvc" class="form-control" id="cvc" value="{{$tarjeta->CVC}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{route('creditCard.read')}}" class="btn btn-danger ">Volver</a>
    </form>
</div>


@endsection