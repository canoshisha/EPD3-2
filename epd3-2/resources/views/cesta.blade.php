@extends('welcome')
@section('title', 'UPOF1')
@section('scs')
<link rel="stylesheet" href="{{ asset('css/cesta.css') }}">
@endsection
@section('contenido')
<div class="container py-5">
    <h1>Cesta de Compra</h1>
    <hr>
    @if ($errors->has('mensaje'))
    <div class="alert alert-danger" role="alert" style="background-color:#f8d7da; border-color:#f5c6cb; color:#721c24;">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        {{ $errors->first('mensaje') }}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
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
                    <td>{{ $productB->product->price }} €</td>
                    <td class="d-flex align-items-center">

                        <form action="{{ route('cesta.updateCantidad', $shoppingBasket) }}" method="POST" class="d-inline">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="productB_id" value="{{ $productB->id }}">
                            <input type="hidden" name="cantidad" value="{{ $productB->cantidad - 1 }}">
                            <div class="input-group h-100">
                                <button type="submit" class="input-group-text">-</button>
                            </div>
                        </form>

                        <span class="mx-2">{{ $productB->cantidad }}</span>

                        <form action="{{ route('cesta.updateCantidad', $shoppingBasket) }}" method="POST" class="d-inline">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="productB_id" value="{{ $productB->id }}">
                            <input type="hidden" name="cantidad" value="{{ $productB->cantidad + 1 }}">
                            <div class="input-group h-100">
                                <button type="submit" class="input-group-text">+</button>
                            </div>
                        </form>
                    </td>
                    <td>{{ $productB->size }}</td>
                    <td>
                        <form action="{{ route('cesta.update', $shoppingBasket) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="productB_id" value="{{ $productB->id }}">
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end fw-bold">Total:</td>
                    <td colspan="1" class="fw-bold">{{ $shoppingBasket->calcularTotal() }} €</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('products.menu') }}" class="btn btn-secondary"><i class="fas fa-shopping-cart me-2"></i>Seguir Comprando</a>
        </div>
        <div class="col-md-6 text-end">
            @if ($shoppingBasket->productBasket->isNotEmpty())
            <form action="{{ route('cesta.destroy') }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <input type="hidden" name="shoppingBasket" value="{{ $shoppingBasket }}">
                <button type="submit" class="btn btn-danger"><i class="fas fa-credit-card me-2"></i>Realizar
                    Compra</button>
            </form>
            @endif
        </div>
    </div>
</div>


@endsection