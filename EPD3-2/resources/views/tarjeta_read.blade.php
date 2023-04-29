@extends('welcome')
@section('title',"UPOF1")
@section('scs')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@endsection
@section('contenido')
    <div class="container">
        <h1>Información Tarjeta de Crédito</h1>
        @if ($tarjeta == null)
            <p>No tiene ninguna tarjeta registrada.</p>
            <a href="{{url('tarjeta_create')}}" class="btn btn-danger col-4 mx-auto">Crear Tarjeta</a>
        @else
        <div class="card" style="width: 18rem;">
            <img src="{{URL::asset('/img/visa-dual.png')}}" class="card-img-top" alt="imagen tarjeta Visa">
            <div class="card-body">
              <h5 class="card-title">Tarjeta de credito #{{$tarjeta->id}}</h5>
              <ul class="list-group">
                <li class="list-group-item"><strong>Número de la tarjeta:</strong> {{$tarjeta->numero_tarjeta}}</li>
                <li class="list-group-item"><strong>Fecha de caducidad: </strong>{{$tarjeta->fecha_caducidad}}</li>
              </ul>
              
            </div>
          </div>
    
          <a href="{{route('creditCard.delete',$tarjeta->id)}}" class="btn btn-danger col-4 mx-auto">Eliminar Tarjeta</a>
        @endif
        
        
    </div>
        
@endsection