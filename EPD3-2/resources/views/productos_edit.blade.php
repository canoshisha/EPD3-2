@extends('template_admin')
@section('contenido')
    <div class="container">
        <form method="POST" action="{{ route('product.update', $product) }}">

            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Nombre del producto</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}">
                @error('name')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Categorías</label>

                @foreach ($todasCategorias as $category)
                    @if ($categorias->contains($category))
                        <label for="{{ $category->type }}">{{ $category->type }}</label>
                        <input type="checkbox" value="{{ $category->type }}" id="{{ $category->type }}" name="categories[]"
                            checked>
                    @else
                        <label for="{{ $category->type }}">{{ $category->type }}</label>
                        <input type="checkbox" value="{{ $category->type }}" id="{{ $category->type }}"
                            name="categories[]">
                    @endif
                @endforeach
                @error('categories')
                <small style="color: red">{{ $message }}</small>
                @enderror


            </div>
            <br>
            <div id="form-group">
                @foreach ($product->sizes as $size)
                <label for="size-s">Talla {{$size->size}}:</label>
                <input type="number" id="size-s" name="stock[]" min="0" value="{{$size->pivot->stock}}"><br><br>
                @endforeach
                @error('stock')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}">
                @error('price')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="description">Descripción del producto</label>
                <input type="text" name="description" class="form-control" id="description"
                    value="{{ $product->description }}">
                @error('description')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="discount">Descuento</label>
                <input type="text" name="discount" class="form-control" id="discount" value="{{ $product->discount }}">
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ url('/productos') }}" class="btn btn-danger">Volver</a>
        </form>
    </div>
@endsection
