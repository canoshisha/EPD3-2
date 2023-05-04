@extends('template_admin')
@section('contenido')
    <div class="container">
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" novalidate>
            @method('post')
            @csrf

            <div class="form-group">
                <label for="name">Nombre del producto</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre del Producto">
            </div>
            <div class="form-group">
                <label for="category">Categorías</label>

                @foreach ($categorias as $category)
                    <label for="{{ $category->type }}">{{ $category->type }}</label>
                    <input type="checkbox" value="{{ $category->type }}" id="{{ $category->type }}" name="categories[]">
                @endforeach


            </div>

            <label for="tallas">Tallas:</label>
            <select id="tallas" name="tallas">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br>
            <br>
            <div id="contenedor"></div>
            <br>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="price">
            </div>

            {{-- <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" class="form-control" id="stock" placeholder="stock">
        </div> --}}

            <div class="form-group">
                <label for="description">Descripción del producto</label>
                <input type="text" name="description" class="form-control" id="description"
                    placeholder="Descripción del producto">
            </div>
            <div class="form-group">
                <label for="discount">Descuento</label>
                <input type="text" name="discount" class="form-control" id="discount" placeholder="Descuento">
            </div>
            <br>
            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="file" id="image" name="image">
            </div>
            <br>
            <div>
                <label for="tipoImagen">Tipo de Imagen:</label>
                <select id="tipoImagen" name="tipoImagen">
                    <option value="imagenMenu">imagenMenu</option>
                    <option value="imagen">imagen</option>
                </select>
            </div>
            <br>


            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ url('/productos') }}" class="btn btn-danger">Volver</a>
        </form>
    </div>

    <script>
        // Obtener el campo de selección y el contenedor
        var cantidadSelect = document.getElementById("tallas");
        var contenedor = document.getElementById("contenedor");

        // Escuchar cambios en el campo de selección
        cantidadSelect.addEventListener("change", function() {
            // Obtener la cantidad seleccionada
            var cantidad = parseInt(cantidadSelect.value);

            // Limpiar el contenedor
            contenedor.innerHTML = "";

            // Generar los campos dinámicamente
            for (var i = 0; i < cantidad; i++) {
                // Crear un div para agrupar los campos
                var div = document.createElement("div");

                // Crear un campo de selección de tallas
                var tallaLabel = document.createElement("label");
                tallaLabel.textContent = "Talla:";
                var tallaSelect = document.createElement("select");
                tallaSelect.name = "talla[]";
                tallaSelect.id = "talla";
                var tallas = ["S", "M", "L", "XL", "XXL", "XXXL"];
                for (var j = 0; j < tallas.length; j++) {
                    var tallaOption = document.createElement("option");
                    tallaOption.value = tallas[j];
                    tallaOption.textContent = tallas[j];
                    tallaSelect.appendChild(tallaOption);
                }

                // Crear un campo de selección de cantidad
                var cantidadLabel = document.createElement("label");
                cantidadLabel.textContent = "stock:";
                var cantidadInput = document.createElement("input");
                cantidadInput.type = "number";
                cantidadInput.name = "stock[]";
                cantidadInput.min = 1;
                cantidadInput.max = 10;

                // Agregar los campos al div
                div.appendChild(tallaLabel);
                div.appendChild(tallaSelect);
                div.appendChild(cantidadLabel);
                div.appendChild(cantidadInput);

                // Agregar el div al contenedor
                contenedor.appendChild(div);
            }
        });
    </script>
@endsection
