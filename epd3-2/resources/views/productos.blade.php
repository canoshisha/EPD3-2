@extends('welcome')
@section('title',"Productos")
@section('contenido')
<section class="products">
    <div class="product">
      <a href="product-page.html">
        <img src="product1.jpg" alt="Producto 1">
        <h3>Producto 1</h3>
        <p>Precio: $19.99</p>
      </a>
    </div>
    <div class="product">
      <a href="product-page.html">
        <img src="product2.jpg" alt="Producto 2">
        <h3>Producto 2</h3>
        <p>Precio: $24.99</p>
      </a>
    </div>
    <div class="product">
      <a href="product-page.html">
        <img src="product3.jpg" alt="Producto 3">
        <h3>Producto 3</h3>
        <p>Precio: $29.99</p>
      </a>
    </div>
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Productos</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $product->price }}</h6>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

@endsection
