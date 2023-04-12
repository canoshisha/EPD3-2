@extends('welcome')
@section('title',"UPOF1")
@section('scs')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@endsection
@section('contenido')
<div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <h1>Bienvenidos a F1 UPO</h1>
        <p>Encuentra la mejor selección de merchandising de Fórmula 1 en nuestra tienda online.</p>
        <a href="#" class="btn btn-primary">Comprar ahora</a>
      </div>
      <div class="col-md-6">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{URL::asset('/img/Merchandising1.jpg')}}" class="d-block w-100 carousel-img" alt="Merchandising 1"/>
              </div>
              <div class="carousel-item">
                <img src="{{URL::asset('/img/Merchandising2.jpg')}}" class="d-block w-100 carousel-img" alt="Merchandising 2">
              </div>
              <div class="carousel-item">
                <img src="{{URL::asset('/img/Merchandising3.jpg')}}" class="d-block w-100 carousel-img" alt="Merchandising 3">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Siguiente</span>
            </button>
          </div>

    </div>
  </div>
</div>
@endsection
