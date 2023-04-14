@extends('welcome')
@section('title', 'UPOF1')
@section('scs')
    <link rel="stylesheet" href="{{ asset('css/cesta.css') }}">
@endsection
@section('contenido')
<div class="container py-5">
    <h1>Cesta de Compra</h1>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Talla</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shoppingBasket->productBasket as $productB)
                <tr>
                    <td>{{ $productB->product->name }}</td>
                    <td>{{ $productB->product->price }}</td>
                    <td>{{ $productB->cantidad}}</td>
                    <td>{{ $productB->size}}</td>
                    <td>
                        <form class="row g-3" action="{{ route('cesta.update', $shoppingBasket) }}" method="POST">
                            @method('update')
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $productB->product->id }}">
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
            <tr>
                <th colspan="5">Total</th>
                <td>{{ $shoppingBasket->calcularTotal() }} </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a href="/products" class="btn btn-secondary">Seguir Comprando</a>
        </div>
        <div class="col-md-6 text-end">
            @if ($shoppingBasket->productBasket->isNotEmpty())
            <form class="row g-3" action="{{ route('cesta.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="shoppingBasket" value="{{ $shoppingBasket }}">
                <button class="btn btn-danger" type="submit">Realizar compra</button>
            </form>
            @endif
        </div>
    </div>
</div>


@endsection
