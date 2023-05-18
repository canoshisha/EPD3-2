@extends('welcome')
@section('title', 'UPOF1')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/cesta.css') }}">
@endsection
@section('content')
    <div class="container py-5">
        <h1>Cesta de Compra</h1>
        <hr>
        @if ($errors->has('mensaje'))
            <script>
                const swal = window.swal;
                swal({
                    title: 'ERROR',
                    text: '{{ $errors->first('mensaje') }}',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif
        <div class="row">
            <div class="col-md-8">
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
                                    @if (!$productB->product->discount)
                                        <td>
                                            <p>{{ $productB->product->price }}€</p>
                                        </td>
                                    @else
                                        <td>
                                            <p><del>{{ $productB->product->price }}€</del>
                                                <b>{{ $productB->product->finalPrice() }}€</b>

                                            </p>
                                        </td>
                                    @endif
                                    <td class="d-flex align-items-center">

                                        <form action="{{ route('cesta.updateCantidad', $shoppingBasket) }}" method="POST"
                                            class="d-inline">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="productB_id" value="{{ $productB->id }}">
                                            <input type="hidden" name="cantidad" value="{{ $productB->cantidad - 1 }}">
                                            <input type="hidden" name="talla" value="{{ $productB->size }}">
                                            <div class="input-group h-100">
                                                <button type="submit" class="input-group-text">-</button>
                                            </div>
                                        </form>

                                        <span class="mx-2">{{ $productB->cantidad }}</span>

                                        <form action="{{ route('cesta.updateCantidad', $shoppingBasket) }}" method="POST"
                                            class="d-inline">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="productB_id" value="{{ $productB->id }}">
                                            <input type="hidden" name="cantidad" value="{{ $productB->cantidad + 1 }}">
                                            <input type="hidden" name="talla" value="{{ $productB->size }}">
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
                                @if (!$shoppingBasket->haveDiscount())
                                    <td colspan="1" class="fw-bold">{{ $shoppingBasket->calcularTotal() }} €</td>
                                @else
                                    <td colspan="1" class="fw-bold"><del>{{ $shoppingBasket->calcularTotal() }}€</del>
                                        {{ $shoppingBasket->calcularTotalDiscount() }}€ </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('products.menu') }}" class="btn btn-secondary"><i
                                class="fas fa-shopping-cart me-2"></i>Seguir Comprando</a>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <h3>Detalles del pago</h3>
                <hr>

                <form action="{{ route('cesta.destroy') }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="tarjeta" class="form-label">Tarjeta de Crédito</label>
                        <select class="form-select" id="select-option" name="tarjeta" required>
                            <option value="">Selecciona una tarjeta</option>
                            <!-- Agrega tus opciones de tarjeta aquí -->
                            @foreach ($tarjetas as $tarjeta)
                                <option value="{{ $tarjeta->id }}" class="opt">
                                    {{ $tarjeta->numero_tarjeta }}</option>
                            @endforeach
                            {{-- <option value="Visa">Visa</option>
                            <option value="Mastercard">Mastercard</option> --}}
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección de envío</label>
                        <select class="form-select" id="select-option" name="direccion" required>
                            <option value="">Selecciona una dirección</option>
                            @foreach ($direcciones as $direccion)
                                <option value="{{ $direccion->id }}" class="opt">
                                    {{ $direccion->street }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($shoppingBasket->productBasket->isNotEmpty())
                        <input type="hidden" name="shoppingBasket" value="{{ $shoppingBasket }}">
                        <button type="submit" id='compra' class="btn btn-danger"><i
                                class="fas fa-credit-card me-2"></i>Realizar
                            Compra</button>
                    @endif
                </form>
            </div>
        </div>
    </div>



    <script src="js/alerta_compra.js"></script>

@endsection
