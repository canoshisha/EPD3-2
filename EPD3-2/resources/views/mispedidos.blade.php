@extends('auth.template')
@section('title', 'Mis pedidos')
@section('content')
    <div class="container">
        <h1>Mis pedidos</h1>
        <a href="{{ url('/home') }}" class="btn btn-danger">Volver</a>
        @foreach ($orders->reverse() as $order)
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
                                <span class="float-end">{{ $product->pivot->quantity }} x {{ $product->pivot->size }}
                                    {{ $product->price }} €</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    @if (isset($order->ticket->price_total))
                        <p class="mb-0"><strong>Total:</strong> {{ $order->ticket->price_total }} €</p>
                        <p class="mb-0"><strong>Estado:</strong> {{ $order->state }}</p>
                        <p class="mb-0"><strong>Método de pago:</strong> {{ $order->pagement }}</p>
                    @endif
                </div>
            </div>
        @endforeach

        {{ $orders->links() }}
    </div>


@endsection
