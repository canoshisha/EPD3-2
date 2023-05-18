@extends('auth.template')
@section('title', 'Editar perfil')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu_edit.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($errors->has('mensaje'))
                <script>
                    const swal = window.swal;
                    swal({
                        title: 'ERROR',
                        text: '{{ $errors->first('mensaje') }}',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                </script>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mi Perfil') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('perfil.update') }}" class="form-inline">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="select-option" class="form-label">{{ __('Modificar') }}</label>
                                <select class="form-select" id="select-option" name="opcion">
                                    <option value="nombre" selected>{{ __('Nombre') }}</option>
                                    <option value="email">{{ __('Email') }}</option>
                                    <option value="password">{{ __('Contraseña') }}</option>
                                </select>
                            </div>

                            <div id="nombre-section">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="input-nombre-actual"
                                            class="form-label">{{ __('Nombre actual') }}</label>
                                        <input type="text" class="form-control" id="input-nombre-actual"
                                            name="nombre_actual" value="{{ auth()->user()->name }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="input-nombre-nuevo" class="form-label">{{ __('Nuevo nombre') }}</label>
                                        <input type="text" class="form-control" id="input-nombre-nuevo"
                                            name="nombre_nuevo">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3" id="email-section">
                                <label for="input-email-actual" class="form-label">{{ __('Email actual') }}</label>
                                <input type="text" class="form-control" id="input-email-actual" name="email_actual"
                                    value="{{ auth()->user()->email }}" readonly>

                                <label for="input-email-nuevo" class="form-label">{{ __('Nuevo email') }}</label>
                                <input type="email" class="form-control" id="input-email-nuevo" name="email_nuevo">
                            </div>

                            <div id="password-section">
                                <div class="row ">
                                    <div class="col-md-4 mb-3">
                                        <label for="input-password-actual"
                                            class="form-label">{{ __('Contraseña actual') }}</label>
                                        <input type="password" class="form-control" id="input-password-actual"
                                            name="password_actual">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="input-password-nuevo"
                                            class="form-label">{{ __('Nueva contraseña') }}</label>

                                        <input type="password" class="form-control" id="input-password-nuevo"
                                            name="password_nuevo">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="input-password-nuevo-confirm"
                                            class="form-label">{{ __('Confirmar nueva contraseña') }}</label>

                                        <input type="password" class="form-control" id="input-password-nuevo-confirm"
                                            name="password_nuevo_confirm">

                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">{{ __('Guardar cambios') }}</button>
                            <a href="{{ url('/home') }}" class="btn btn-danger">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/form_user.js"></script>


@endsection
