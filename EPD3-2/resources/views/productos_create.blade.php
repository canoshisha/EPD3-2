@extends('template_admin')
@section('contenido')
    <div class="container">
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" novalidate>
            @method('post')
            @csrf

            <div class="form-group">
                <label for="name">Nombre del producto</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre del Producto"
                     value="{{old('name')}}">
                @error('name')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Categorías</label>

                @foreach ($categorias as $category)
                    <label for="{{ $category->type }}">{{ $category->type }}</label>
                    <input type="checkbox" value="{{ $category->type }}" id="{{ $category->type }}" name="categories[]">
                @endforeach
                @error('categories')
                <br>
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <br>
            <div id="form-group">
                <label for="size-s">Talla S:</label>
                <input type="number" id="size-s" name="stock[]" min="0" value="0"><br><br>
              
                <label for="size-m">Talla M:</label>
                <input type="number" id="size-m" name="stock[]" min="0" value="0"><br><br>
              
                <label for="size-l">Talla L:</label>
                <input type="number" id="size-l" name="stock[]" min="0" value="0"><br><br>
              
                <label for="size-xl">Talla XL:</label>
                <input type="number" id="size-xl" name="stock[]" min="0" value="0"><br><br>
              
                <label for="size-xxl">Talla XXL:</label>
                <input type="number" id="size-xxl" name="stock[]" min="0" value="0"><br><br>
              
                <label for="size-xxxl">Talla XXXL:</label>
                <input type="number" id="size-xxxl" name="stock[]" min="0" value="0"><br><br>
                @error('stock')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="price" value="{{old('price')}}">
                @error('price')
                <small style="color: red">{{ $message }}</small>
                @enderror
                
            </div>

            <div class="form-group">
                <label for="description">Descripción del producto</label>
                <input type="text" name="description" class="form-control" id="description"
                    placeholder="Descripción del producto" value="{{old('description')}}">
                @error('description')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="discount">Descuento</label>
                <input type="text" name="discount" class="form-control" id="discount" placeholder="Descuento" min="0" value="{{old('discount')}}">
            </div>
            <br>

            <br>
            <label for="cantImagen">Numero de Imagenes:</label>
            <select id="cantImagen" name="cantImagen">
                <option value="Seleccione un numero" selected>Seleccione un número</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <br>
            <br>
            <div id="contenedorImg">
                @error('imagen')
                <small style="color: red">{{ $message }}</small>
                @enderror
                <br>
                @error('tipoImagen')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <br>
            <br>


            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ url('/productos') }}" class="btn btn-danger">Volver</a>
        </form>
    </div>

    <script>
        
        // Obtener el campo de selección y el contenedor
        var cantidadImg = document.getElementById("cantImagen");
        var contenedorImg = document.getElementById("contenedorImg");

        // Escuchar cambios en el campo de selección
        cantidadImg.addEventListener("change", function() {
            // Obtener la cantidad seleccionada
            var cantidad = parseInt(cantidadImg.value);

            // Limpiar el contenedor
            contenedorImg.innerHTML = "";

            // Generar los campos dinámicamente
            for (var i = 0; i < cantidad; i++) {
                // Crear un div para agrupar los campos
                var div = document.createElement("div");

                // Crear un campo de selección de tallas
                var imgLabel = document.createElement("label");
                imgLabel.textContent = "Imagen:";
                var imgFile = document.createElement("input");
                imgFile.name = "imagen[]";
                imgFile.id = "imagen";
                imgFile.type = 'file';

                // Crear un campo de selección de cantidad
                var tipoImgLabel = document.createElement("label");
                tipoImgLabel.textContent = "Tipo Imagen:";
                var tipoImgInput = document.createElement("select");
                tipoImgInput.name = "tipoImagen[]";
                tipoImgInput.id = "tipoImagen";
                if (i == 0) {
                    var tipos = ["Seleccione un tipo de imagen", "ImagenMenu"];
                    for (var j = 0; j < tipos.length; j++) {
                        var tipoOption = document.createElement("option");
                        tipoOption.value = tipos[j];
                        tipoOption.textContent = tipos[j];
                        tipoImgInput.appendChild(tipoOption);
                    }
                } else {
                    var tipos = ["Seleccione un tipo de imagen", "Imagen"];
                    for (var j = 0; j < tipos.length; j++) {
                        var tipoOption = document.createElement("option");
                        tipoOption.value = tipos[j];
                        tipoOption.textContent = tipos[j];
                        tipoImgInput.appendChild(tipoOption);
                    }
                }


                // Agregar los campos al div
                div.appendChild(imgLabel);
                div.appendChild(imgFile);
                div.appendChild(tipoImgLabel);
                div.appendChild(tipoImgInput);

                // Agregar el div al contenedor
                contenedorImg.appendChild(div);
            }
        });
    </script>
@endsection
