@extends('welcome')
@section('title', 'UPOF1')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@endsection
@section('content')
    <div class="container mt-5">
        @if (session('mensaje'))
            <script>
                const swal = window.swal;
                swal({
                    title: 'Compra',
                    text: '{{ session('mensaje') }}',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif
        <div class="card h-100">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="jumbotron text-center my-auto">
                        <h1 class="display-4">{{ __('messages.titleWelcome') }}</h1>
                        <p class="lead">
                            {{ __('messages.textWelcome') }}
                        </p>
                        <hr class="my-4">
                        <form action="{{ route('products.menu') }}" method="POST">
                            @method('get')
                            @csrf
                            <div>
                                <button type="submit" class="btn btn-danger btn-lg">{{ __('messages.buyNow') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ URL::asset('/img/Merchandising1.png') }}" class="d-block w-100 carousel-img"
                                    alt="Merchandising 1" />
                            </div>
                            <div class="carousel-item">
                                <img src="{{ URL::asset('/img/Merchandising2.png') }}" class="d-block w-100 carousel-img"
                                    alt="Merchandising 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ URL::asset('/img/Merchandising3.png') }}" class="d-block w-100 carousel-img"
                                    alt="Merchandising 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
