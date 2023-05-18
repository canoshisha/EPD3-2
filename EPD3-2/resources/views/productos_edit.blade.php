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
                    <div class="invalid-feedback">{{ $message }}</div>
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
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror


            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="description">Descripción del producto</label>
                <input type="text" name="description" class="form-control" id="description"
                    value="{{ $product->description }}">
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="discount">Descuento</label>
                <input type="text" name="discount" class="form-control" id="discount" value="{{ $product->discount }}">
                @error('discount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ url('/productos') }}" class="btn btn-danger">Volver</a>
        </form>
    </div>
@endsection
