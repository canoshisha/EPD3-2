@extends('welcome')
@section('title', 'Productos')
@section('scs')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection
@section('contenido')
<section class="products">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Productos</h3>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-center">
                                @if (session('mensaje'))
                                <div class="alert alert-success my-4 text-center">
                                    {{ session('mensaje') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @php $count = 0; @endphp
                        <!-- initialize a count variable -->
                        @foreach($products as $product)
                        @if($product->stock >0)
                        @if($count % 3 == 0)
                        <!-- if count is divisible by 3, start a new row -->
                        <div class="row">
                            @endif
                            <div class="col-md-4 mt-3">
                                <div class="card h-100">
                                    <?php
                                    $imagen = $imgProducts->where('products_id', $product->id);
                                    $img = $imagen->first();
                                    ?>
                                    <img class="card-img-top img-product" src="{{ URL::asset($img->routeImg) }}"
                                        alt="{{$product->description}}">
                                    <div class="card-body d-flex flex-column">
                                        <p class="text-center fs-5">{{$product->name}}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-center">
                                        <a class="btn btn-danger col-4 mx-auto"
                                            href="{{route('producto.descripcion',$product)}}">{{$product->price}}€</a>
                                    </div>
                                </div>
                            </div>
                            @php $count++; @endphp
                            <!-- increment count -->
                            @if($count % 3 == 0)
                            <!-- if count is divisible by 3, end the row -->
                        </div>
                        @endif
                        @endif
                        @endforeach
                        @if($count % 3 != 0)
                        <!-- if count is not divisible by 3, end the last row -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
        {{$products->links()}}
    </div>
</section>


@endsection