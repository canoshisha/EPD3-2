@extends('welcome')
@section('title', __('messages.favorites'))
{{-- @section('scs')
    <link rel="stylesheet" href="{{ asset('css/product_des.css') }}">
@endsection --}}
@section('contenido')
    <div class="container">
        <section class="favorites">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ __('messages.favorites') }}</h3>
                        </div>
                        <div class="card-body">
                            @php $count = 0; @endphp
                            <!-- initialize a count variable -->
                            @forelse ($products as $product)
                                @if ($product->stock_p() > 0)
                                    @if ($count % 3 == 0)
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
                                                alt="{{ $product->description }}">
                                            <div class="card-body d-flex flex-column">
                                                <p class="text-center fs-5">{{ $product->name }}</p>
                                            </div>
                                            <div class="card-footer d-flex justify-content-center">
                                                <a class="btn btn-danger col-4 mx-auto"
                                                    href="{{ route('producto.descripcion', $product) }}">Ver</a>
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
                    @empty
                        <h4>Ahora mismo no tienes ningún producto en favorito</h4>
                        @endforelse
                        @if ($count % 3 != 0)
                            <!-- if count is not divisible by 3, end the last row -->
                    </div>
                    @endif
                </div>
            </div>
    </div>
    </section>
@endsection
