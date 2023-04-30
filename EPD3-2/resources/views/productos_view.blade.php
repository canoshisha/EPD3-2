@extends('template_admin')
@section('contenido')
    <div class="container">
        <h1>Lista de Productos</h1>
        <hr>
        <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Crear Producto</a>
        <hr>
        <div class="col">
            <div class="d-flex justify-content-center">
                @if (session('mensaje'))
                <div class="alert alert-success my-4 text-center">
                    {{ session('mensaje') }}
                </div>
                @endif
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Discount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>
                            <form id=actualizar_form method="POST" action="{{ route('product.update', $product->id) }}"
                                style="display:none;">
                                @csrf
                                @method('put')
                                <input type="text" value="{{ $product->id }}" name="type" id="type">
                                <button id='actualizar' type="submit" class="btn btn-primary">actualizar</button>
                            </form>
                            <button id='actualizar_show' type="button" class="btn btn-primary">actualizar</button>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button id='eliminar' type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>

    <script src="js/alerta_category.js"></script>
@endsection
