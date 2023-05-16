@extends('template_admin')
@section('contenido')
    <div class="container">
        <h1>Lista de pedidos</h1>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre usuario</th>
                    <th>Pagement</th>
                    <th>State</th>
                    <th>Fecha</th>
                    <th>Direccion</th>
                    <th>Email user</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->credit_card }}</td>
                        <td>{{ $order->state }}</td>
                        <td>{{ $order->date }}</td>
                        <td>{{ $order->direccion->street }},{{ $order->direccion->number }},{{ $order->direccion->other_description }},
                            {{ $order->direccion->city }},{{ $order->direccion->country }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
    <script src="js/alerta_pedidos.js"></script>
@endsection
