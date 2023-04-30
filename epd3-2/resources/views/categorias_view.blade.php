@extends('template_admin')
@section('contenido')
    <div class="container">
        <h1>Lista de Categorias</h1>
        <hr>
        <a id="mostrar-formulario" class="btn btn-primary mb-3">Crear Categoria</a>
        <form id='crear' method="POST" action="{{ route('category.create') }}" style="display:none;">
            @csrf
            <div class="form-group row">

                <div class="col-8">
                    <div class="input-group">
                        <input id="type" name="type" type="text" placeholder="type" class="form-control">
                        <button name="submit" id='crear_btn' type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->type }}</td>
                        <td>
                            <form method="POST" action="{{ route('category.destroy', $category->id) }}">
                                @csrf
                                @method('DELETE')
                                <button id='eliminar' type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>

    <script src="js/alerta_category.js"></script>
@endsection
