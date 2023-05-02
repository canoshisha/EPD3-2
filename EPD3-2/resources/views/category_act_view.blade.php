@extends('template_admin')
@section('contenido')
    <div class="container">
        <h1>Actualizar categoría</h1>
        <hr>

        <form id='actualizar_form' method="POST" action="{{ route('category.update', $category->id) }}">
            @csrf
            @method('put')
            <label for="type"> </label>
            <input type="text" value="{{ $category->type }}" name="type" id="type">
            <button id='actualizar' type="submit" class="btn btn-primary">actualizar</button>
        </form>
        <a href="{{ url('/categories') }}" class="btn btn-danger">Volver</a>
    @endsection
