@extends('welcome')
@section('title', 'Productos')
@section('scs')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection
@section('contenido')
    <section class="products">
        <div class="row">
            <div class="col-md-12">
                <h2>Productos</h2>
                <hr>
            </div>
            @foreach($products as $product)
            <div class="product col-md-3">
                <div class="card h-100 align-items-center justify-content-center">
                  <a href="{{route('producto.descripcion',$product)}}" class="text-decoration-none">
                    <?php
                      $imagen = $imgProducts->where('products_id' , $product->id);
                      $img = $imagen->first();
                    ?>
                    <div class="d-flex mb-3">
                      <img class="img-fluid img-product align-self-center" src="{{ URL::asset($img->routeImg) }}" alt="Aston Martin Aramco Cognizant F1 2023 Camiseta oficial del piloto del equipo Fernando Alonso" style="margin-top: 10px; flex-shrink: 0;">
                    </div>
                    <div class="card-body d-flex flex-column justify-content-end">
                      <h3 class="text-center fs-5">{{$product->name}}</h3>
                    </div>
                    <div class="card-footer text-center">
                      <p>{{$product->price}}€</p>
                    </div>
                  </a>
                </div>
              </div>



            @endforeach

            
        </div>
    </section>

    
@endsection
