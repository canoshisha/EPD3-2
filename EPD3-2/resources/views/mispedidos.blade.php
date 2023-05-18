@extends('welcome')
@section('title', 'Mis pedidos')
@section('content')
    <div class="container">
        <section class="favorites">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Mis pedidos</h3>
                        </div>
                        <div class="card-body">

                            @forelse ($orders->reverse() as $order)
                                <div class="card my-3">
                                    <div class="card-header">
                                        Pedido #{{ $order->id }}
                                        <span class="float-end">{{ $order->date }}</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Productos</h5>
                                        <ul class="list-group list-group-flush">

                                            @foreach ($order->products as $product)
                                                <li class="list-group-item">
                                                    {{ $product->name }}
                                                    <span class="float-end">{{ $product->pivot->quantity }} x
                                                        {{ $product->pivot->size }}
                                                        {{ $product->finalPrice() }} €</span>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        @if (isset($order->ticket->price_total))
                                            <p class="mb-0"><strong>Total:</strong> {{ $order->ticket->price_total }} €
                                            </p>
                                            <p class="mb-0"><strong>Estado:</strong> {{ $order->state }}</p>
                                            <p class="mb-0"><strong>Método de pago:</strong>
                                                {{ $order->credit_cards->numero_tarjeta }}</p>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <h4>No tienes ahora mismo ningún pedido realizado</h4>
                            @endforelse

                            <div class="d-flex justify-content-between">
                                {{ $orders->links() }}
                                <a href="{{ url('/home') }}" class="btn btn-danger btn-fit-content btn-lg">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
