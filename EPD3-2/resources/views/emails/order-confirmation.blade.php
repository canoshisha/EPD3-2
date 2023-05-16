<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmación de Orden</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h2 class="text-center mb-0">¡Gracias por tu compra!</h2>
                    </div>
                    <div class="card-body">
                        <p>Hola {{ $user->name }},</p>
                        <p>Esta es una confirmación de tu orden:</p>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Tamaño</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                        <td>{{ $product->pivot->size }}</td>
                                        @if (!$product->discount)
                                            <td>
                                                <p>{{ $product->price }}€</p>
                                            </td>
                                        @else
                                            <td>
                                                <p><del>{{ $product->price }}€</del>
                                                    <b>{{ $product->finalPrice() }}€</b>

                                                </p>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <p class="lead">Total: {{ $ticket->price_total }} €</p>
                        Address:
                        {{ $order->direccion->street }},{{ $order->direccion->number }},{{ $order->direccion->other_description }}
                        </p>
                        <p>
                            {{ $order->direccion->city }},{{ $order->direccion->country }}
                        </p>
                        <p>¡Esperamos que disfrutes tu compra!</p>

                        <p>Saludos,<br>
                            UPO F1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
