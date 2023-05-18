@extends('welcome')
@section('title', __('messages.favorites'))
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_des.css') }}">
@endsection
@section('content')
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
                                                    href="{{ route('producto.descripcion', $product) }}">{{ __('messages.view') }}</a>
                                                @if (Auth::user())
                                                    <form action="{{ route('favorites.toggle', $product) }}" method="POST">
                                                        @csrf

                                                        @if (Auth::user()->favorites()->where('products_id', $product->id)->exists())
                                                            <button type="submit" class="btn btn-icon btn-danger"> <img
                                                                    src="{{ URL::asset('/img/me-gusta.png') }}"
                                                                    alt="Is fav" class="btn-icon__img" width="24"
                                                                    height="24"></button>
                                                        @else
                                                            <button type="submit" class="btn btn-icon btn-outline-danger">
                                                                <img src="{{ URL::asset('/img/no-me-gusta.png') }}"
                                                                    alt="No is fav" class="btn-icon__img" width="24"
                                                                    height="24"></button>
                                                        @endif

                                                    </form>
                                                @endif
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
