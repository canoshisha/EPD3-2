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
            <div class="product col-md-3">
                <div class="card h-100">
                    <a href="/des_producto" class="text-decoration-none">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <img class="img-product" src="{{ URL::asset('/img/Merchandising1.jpg') }}"
                                alt="Aston Martin Aramco Cognizant F1 2023 Camiseta oficial del piloto del equipo Fernando Alonso">
                        </div>
                        <div class="card-body">
                            <h3 class="text-center fs-5">Aston Martin Aramco Cognizant F1 2023 Camiseta oficial del piloto
                                del equipo Fernando Alonso</h3>
                            <p>Precio: 79.99€</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="product col-md-3">
                <div class="card h-100">


                    <a href="/des_producto" class="text-decoration-none">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <img class="img-product" src="{{ URL::asset('/img/Merchandising2.jpg') }}"
                                alt="Gorra oficial del equipo Aston Martin Aramco Cognizant F1 2023 - Verde">
                        </div>
                        <div class="card-body">
                            <h3 class="text-center fs-5">Gorra oficial del equipo Aston Martin Aramco Cognizant F1 2023 -
                                Verde</h3>
                            <p>Precio: 39.00€</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="product col-md-3">
            <div class="card h-100">


                <a href="/des_producto" class="text-decoration-none">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <img class="img-product" src="{{ URL::asset('/img/Merchandising3.jpg') }}"
                            alt="Camiseta del equipo Scuderia Ferrari 2022">
                    </div>
                    <div class="card-body">
                        <h3 class="text-center fs-5">Camiseta del equipo Scuderia Ferrari 2022</h3>
                        <p>Precio: 38.25€</p>
                </a>
            </div>
        </div>
        </div>
        </div>
    </section>

    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Productos</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
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
