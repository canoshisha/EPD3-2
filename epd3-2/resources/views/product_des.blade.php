@extends('welcome')
@section('title',"Camiseta X")
@section('scs')
<link rel="stylesheet" href="{{ asset('css/product_des.css') }}">
@endsection
@section('contenido')
<div class="container py-5">
<div class="card h-100">
    <div class="row mx-auto">
      <div class="col-md-6">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <?php
                        
             $img1 = $imgProduct->first();
             $img2 = $imgProduct->last();
             ?>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ URL::asset($img1->routeImg) }}" class="img-product d-block w-100" alt="Camiseta1">
            </div>
            <div class="carousel-item">
              <img src="{{ URL::asset($img2->routeImg) }}" class="img-product d-block w-100" alt="Camiseta2">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-md-6">
        <h1>Camiseta {{$product->name}}</h1>
        <p class="lead">Descripción:<br>
          {{$product->description}}
        </p>
        <p class="lead">{{$product->price}}€</p>
        <form action="{{route('producto.add')}}">
          <div class="mb-3">
            <label for="talla" class="form-label">Talla</label>
            <select id="talla" class="form-select custom-select">
              <option class="opt" selected>Selecciona una talla</option>
              <option class="opt" value="S">S</option>
              <option class="opt" value="M">M</option>
              <option class="opt" value="L">L</option>
              <option class="opt" value="XL">XL</option>
              <option class="opt" value="XXL">XXL</option>
              <option class="opt" value="XXXL">XXXL</option>
            </select>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-danger">Añadir a la cesta</button>
          </div>
        </form>
      </div>
    </div></div>
  </div>

@endsection
