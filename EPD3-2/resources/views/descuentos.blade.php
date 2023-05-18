@extends('welcome')
@section('title', __('messages.discount'))
@section('css')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection
@section('content')
    @if (session('mensaje'))
        <script>
            const swal = window.swal;
            swal({
                title: 'Cesta',
                text: '{{ session('mensaje') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
    <section class="products">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ __('messages.discount') }}</h3>
                        </div>
                        <div class="card-body">
                            @php $count = 0; @endphp
                            @foreach ($products as $product)
                                @if ($product->stock_p() > 0 and $product->discount > 0)
                                    @if ($count % 3 == 0)
                                        <div class="row">
                                    @endif
                                    <div class="col-md-4 mt-3">
                                        <div class="card h-100">
                                            <?php
                                            $imagen = $imgProducts->where('products_id', $product->id);
                                            $img = $imagen->first();
                                            ?>
                                            <img class="card-img-top img-product" src="{{ URL::asset($img->routeImg) }}"
                                                alt="{{ $product->description }}">
                                            <div class="card-body d-flex flex-column">
                                                <p class="text-center fs-5">{{ $product->name }}</p>

                                                @if ($product->discount)
                                                    <b>
                                                        <p class='text-center discount-message'>Ahora con
                                                            {{ $product->discount }}% de
                                                            decuento</p>
                                                        <p class="text-center">Antes: <del>{{ $product->price }}€</del></p>
                                                        <p class="text-center">Ahora:
                                                            {{ $product->finalPrice() }}€</p>
                                                    </b>
                                                @else
                                                    <p class="text-center fs-5"><b>Precio:{{ $product->price }}€ </b></p>
                                                @endif
                                            </div>
                                            <div class="card-footer d-flex justify-content-center">
                                                <a class="btn btn-danger col-4 mx-auto"
                                                    href="{{ route('producto.descripcion', $product) }}">{{ __('messages.view') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @php $count++; @endphp
                                    <!-- increment count -->
                                    @if ($count % 3 == 0)
                                        <!-- if count is divisible by 3, end the row -->
                        </div>
                        @endif
                        @endif
                        @endforeach
                        @if ($count % 3 != 0)
                            <!-- if count is not divisible by 3, end the last row -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
        {{ $products->links() }}
        </div>
    </section>


@endsection
