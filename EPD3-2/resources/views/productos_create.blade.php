@extends('welcome')
@section('title',"UPOF1")
@section('scs')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@endsection
@section('contenido')
<div class="container">
    <form method="POST" action="{{route('Product.create')}}">
        @method('get')
        @csrf
    
        <div class="form-group">
            <label for="name">Nombre del producto</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre del Producto">
        </div>
        <div class="form-group">
            <label for="category">Categoría</label>
            <select name="category" id="category">
                @foreach ($categorias as $category)
                <option value="{{$category->type}}"></option>  
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="price">
        </div>
    
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" class="form-control" id="stock" placeholder="stock">
        </div>
    
        <div class="form-group">
            <label for="description">Descripción del producto</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="Descripción del producto">
        </div>
        <div class="form-group">
            <label for="discount">Descuento</label>
            <input type="text" name="discount" class="form-control" id="discount" placeholder="Descuento">
        </div>
    
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{url('/home')}}" class="btn btn-danger">Volver</a>
    </form>
</div>


@endsection