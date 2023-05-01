@extends('auth.template')
@section('title', 'Editar perfil')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu_edit.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mi Perfil') }}</div>

                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('perfil.update') }}"> --}}
                        <form method="POST" action=#>
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="select-option" class="form-label">{{ __('Modificar') }}</label>
                                <select class="form-select" id="select-option" name="opcion">
                                    <option value="nombre">{{ __('Nombre') }}</option>
                                    <option value="email">{{ __('Email') }}</option>
                                    <option value="password">{{ __('Contraseña') }}</option>
                                </select>
                            </div>

                            <div class="mb-3" id="nombre-section">
                                <label for="input-nombre-actual" class="form-label">{{ __('Nombre actual') }}</label>
                                <input type="text" class="form-control" id="input-nombre-actual" name="nombre_actual"
                                    value="{{ auth()->user()->name }}" readonly>

                                <label for="input-nombre-nuevo" class="form-label">{{ __('Nuevo nombre') }}</label>
                                <input type="text" class="form-control" id="input-nombre-nuevo" name="nombre_nuevo">
                            </div>

                            <div class="mb-3" id="email-section">
                                <label for="input-email-actual" class="form-label">{{ __('Email actual') }}</label>
                                <input type="text" class="form-control" id="input-email-actual" name="email_actual"
                                    value="{{ auth()->user()->email }}" readonly>

                                <label for="input-email-nuevo" class="form-label">{{ __('Nuevo email') }}</label>
                                <input type="email" class="form-control" id="input-email-nuevo" name="email_nuevo">
                            </div>

                            <div class="mb-3" id="password-section">
                                <label for="input-password-actual" class="form-label">{{ __('Contraseña actual') }}</label>
                                <input type="password" class="form-control" id="input-password-actual"
                                    name="password_actual">

                                <label for="input-password-nuevo" class="form-label">{{ __('Nueva contraseña') }}</label>
                                <input type="password" class="form-control" id="input-password-nuevo" name="password_nuevo">

                                <label for="input-password-nuevo-confirm"
                                    class="form-label">{{ __('Confirmar nueva contraseña') }}</label>
                                <input type="password" class="form-control" id="input-password-nuevo-confirm"
                                    name="password_nuevo_confirm">
                            </div>


                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Guardar cambios') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
