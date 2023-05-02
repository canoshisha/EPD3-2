@extends('welcome')
@section('title', "$product->name")
@section('scs')
    <link rel="stylesheet" href="{{ asset('css/product_des.css') }}">
@endsection
@section('contenido')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    @if ($errors->has('mensaje'))
                        <div class="alert alert-danger" role="alert"
                            style="background-color:#f8d7da; border-color:#f5c6cb; color:#721c24;">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('mensaje') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <div class="card h-100">
            <div class="row mx-auto">
                <div class="col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <?php

                        $img1 = $imgProduct->first();
                        $img2 = $imgProduct->last();
                        ?>
                        <div class="carousel-inner">
                            <div class="carousel-item  align-items-center justify-content-center active">
                                <img src="{{ URL::asset($img1->routeImg) }}" class="img-fluid img-product align-self-center"
                                    alt="Camiseta1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ URL::asset($img2->routeImg) }}" class="img-fluid img-product align-self-center"
                                    alt="Camiseta2">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1>{{ $product->name }}</h1>
                    <p class="lead">Descripción:<br>
                        {{ $product->description }}
                    </p>
                    <p class="lead">{{ $product->price }}€</p>
                    <form class="needs-validation" action="{{ route('cesta.addProductB') }}" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="talla" class="form-label">Talla</label>
                            <select id="talla" name="talla" class="form-select custom-select" required
                                data-error="Por favor, selecciona una talla">
                                <option class="opt" selected disabled value="">Selecciona una talla</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->size }}" class="opt">{{ $size->size }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('talla'))
                                <div class="alert alert-danger">{{ $errors->first('talla') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <select id="cantidad" name="cantidad" class="form-select custom-select" required
                                data-error="Por favor, selecciona una cantidad">
                                <option class="opt" selected disabled value="">Selecciona una cantidad</option>
                                @if (isset($product))

                                    @for ($i = 1; $i <= 10; $i++)
                                        <option class="opt" value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                @endif
                            </select>
                            @if ($errors->has('cantidad'))
                                <div class="alert alert-danger">{{ $errors->first('cantidad') }}</div>
                            @endif
                        </div>


                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger">Añadir a la cesta</button>
                        </div>
                    </form>
                    @if (Auth::user())
                        <div class="mb-3">
                            <form action="{{ route('favorites.toggle', $product) }}" method="POST">
                                @csrf

                                @if (Auth::user()->favorites()->where('products_id', $product->id)->exists())
                                    <button type="submit" class="btn btn-icon btn-danger"> <img
                                            src="{{ URL::asset('/img/me-gusta.png') }}" alt="Is fav"
                                            class="btn-icon__img" width="24" height="24"></button>
                                @else
                                    <button type="submit" class="btn btn-icon btn-outline-danger"> <img
                                            src="{{ URL::asset('/img/no-me-gusta.png') }}" alt="No is fav"
                                            class="btn-icon__img" width="24" height="24"></button>
                                @endif

                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
