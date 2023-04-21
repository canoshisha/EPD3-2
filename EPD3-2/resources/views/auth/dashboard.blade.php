@extends('auth.template')
@section('title', 'Mi perfil')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Mi perfil</h3>
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>

                    @else
                    <div class="row">
                        <div class="col-md-4 mt-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="/img/user.png" alt="Editar usuario">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Editar nombre usuario</h5>
                                    <p class="card-text">Cambia tu nombre</p>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-danger col-4 mx-auto" href="#">Editar</a>
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
                                    <a class="btn btn-danger col-4 mx-auto" href="{{route('cesta.mispedidos')}}">Ver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="/img/payment.png" alt="Mi método de pago">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Mi método de pago</h5>
                                    <p class="card-text">Administra tus métodos de pago y configura tus preferencias.
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-danger col-4 mx-auto" href="#">Ver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="/img/pass.png" alt="Mi método de pago">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Editar contraseña</h5>
                                    <p class="card-text">Cambia tu contraseña.
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-danger col-4 mx-auto" href="#">Editar</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection