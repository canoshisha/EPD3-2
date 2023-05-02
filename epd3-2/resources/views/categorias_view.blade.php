@extends('template_admin')
@section('contenido')
    @if (session('success-perfil'))
        <script>
            const swal = window.swal;
            swal({
                title: 'Actualización',
                text: '{{ session('success-perfil') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
    <div class="container">
        <h1>Lista de Categorias</h1>
        <hr>
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
        <button id="crear_show" type="button" class="btn btn-primary mb-3">Crear Categoria</button>
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
                            <form method="POST" action="{{ route('category.supdate') }}">
                                @csrf
                                @method('GET')
                                <input type="hidden" name="type" id="type" value="{{ $category->type }}">
                                <input type="hidden" name="id" id="id" value="{{ $category->id }}">
                                <button id='actualizar' type="submit" class="btn btn-primary">actualizar</button>
                            </form>

                        </td>
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
