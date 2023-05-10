@extends('auth.template')
@section('title', __('messages.my_profile'))

@section('content')
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('messages.my_profile') }}</h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @else
                            <div class="row">

                                <div class="col-md-4 mt-4">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="/img/user.png" alt="Editar usuario">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">Editar usuario</h5>
                                            <p class="card-text">En este apartado puedes editar contraseña,email y nombre de
                                                usuario</p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                            <a class="btn btn-danger btn-block"
                                                href="{{ route('edit-menu.user') }}">Editar</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="/img/orders.png" alt="Mis pedidos">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">Mis pedidos</h5>
                                            <p class="card-text">Revisa tus pedidos y el estado de los envíos.</p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                            <a class="btn btn-danger btn-block"
                                                href="{{ route('cesta.mispedidos') }}">Ver</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="/img/payment.png" alt="Mi método de pago">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">Mi método de pago</h5>
                                            <p class="card-text">Administra tus métodos de pago y configura tus
                                                preferencias.
                                            </p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                            <a class="btn btn-danger btn-block"
                                                href="{{ route('creditCard.read') }}">Ver</a>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::check() && Auth::user()->is_admin)
                                    <div class="col-md-4 mt-4">
                                        <div class="card h-100">
                                            <img class="card-img-top" src="/img/admin.png" alt="Mi método de pago">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">Dashboard admin</h5>
                                                <p class="card-text">Ingresa al panel de administración para gestionar tu
                                                    sitio web
                                                </p>
                                            </div>
                                            <div class="card-footer d-flex justify-content-center">
                                                <a class="btn btn-danger btn-block" href="{{ route('admin.dashboard') }}"
                                                    class="nav-link">Ir</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>


                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
