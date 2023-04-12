@extends('welcome')
@section('title',"Camiseta X")
@section('scs')
<link rel="stylesheet" href="{{ asset('css/product_des.css') }}">
@endsection
@section('contenido')
<div class="container py-5">
    <div class="row">
      <div class="col-md-6">
        <img src="https://via.placeholder.com/400x400.png?text=Camiseta" class="img-fluid" alt="Camiseta">
      </div>
      <div class="col-md-6">
        <h1>Camiseta X</h1>
        <p class="lead">Descipción:<br>
            Aston Martin Aramco Cognizant F1 2023 Camiseta oficial del piloto del equipo Fernando Alonso
        </p>
        <p class="lead">Precio: 79.99€</p>
        <form action="#">
          <div class="mb-3">
            <label for="talla" class="form-label">Talla</label>
            <select id="talla" class="form-select">
              <option selected>Selecciona una talla</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
              <option value="XXXL">XXXL</option>
            </select>
            <br>
            <label for="cantidad" class="form-label">Cantidad</label>
            <select id="cantidad" class="form-select">
                <option selected>Selecciona una cantidad</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-danger">Añadir a la cesta</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
