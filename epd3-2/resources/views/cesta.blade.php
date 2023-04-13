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
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shoppingBasket->products as $product)
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <form class="row g-3" action="{{ route('cesta.update', $shoppingBasket) }}"
                            method="PUT">
                            @method('update')
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                @endforeach
                <tr>
                    <th colspan="3">Total</th>
                    <td>{{ $shoppingBasket->calcularTotal() }} </td>
                </tr>
            </tfoot>
        </table>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <a href="/productos" class="btn btn-secondary">Seguir Comprando</a>
            </div>
            <div class="col-md-6 text-end">
                <a href="#" class="btn btn-danger">Realizar Pedido</a>
                {{-- falta que se cree una compra(orders) y un ticket de forma automatica al pulsar aqui, ademas de borrar la shoppingBasket. --}}
            </div>
        </div>
    </div>

@endsection
