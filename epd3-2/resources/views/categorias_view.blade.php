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
                            <form id=actualizar_form method="POST" action="{{ route('category.update', $category->id) }}"
                                style="display:none;">
                                @csrf
                                @method('put')
                                <input type="text" value="{{ $category->type }}" name="type" id="type">
                                <button id='actualizar' type="submit" class="btn btn-primary">actualizar</button>
                            </form>
                            <button id='actualizar_show' type="button" class="btn btn-primary">actualizar</button>
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
