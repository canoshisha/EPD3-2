@extends('welcome')
@section('title',"UPOF1")
@section('scs')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@endsection
@section('contenido')
<div class="container">
    <form method="POST" action="{{route('product.update')}}">
        @method('put')
        @csrf
    
        <div class="form-group">
            <label for="name">Nombre del producto</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="category">Categoría</label>
            
                @foreach ($categorias as $category)
                <input type="checkbox"value="{{$category->type}}">{{$category->type}}/>  
                @endforeach
            
        </div>
    
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" name="price" class="form-control" id="price" value="{{$product->price}}">
        </div>
    
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" class="form-control" id="stock" value="{{$product->stock}}">
        </div>
    
        <div class="form-group">
            <label for="description">Descripción del producto</label>
            <input type="text" name="description" class="form-control" id="description" value="{{$product->description}}">
        </div>
        <div class="form-group">
            <label for="discount">Descuento</label>
            <input type="text" name="discount" class="form-control" id="discount" value="{{$product->discount}}">
        </div>
    
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{url('/home')}}" class="btn btn-danger">Volver</a>
    </form>
</div>


@endsection