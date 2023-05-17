@extends('auth.template')
@section('title', 'Mis Direcciones')
@section('content')
@if (session('mensaje'))
<script>
    const swal = window.swal;
    swal({
        title: 'Actualización',
        text: '{{ session('mensaje') }}',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });
</script>
@endif
    <div class="container">
        <section class="favorites">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Mis Direcciones</h3>
                        </div>
                        <div class="card-body">


                                <div class="card my-3">
                                    <div class="card-header">
                                        <h1>Información Direcciones de Envío</h1>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap">
                                            @forelse ($addresses->reverse() as $address)
                                                <div class="card mb-3" style="width: 18rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Dirección #{{ $address->id }}</h5>
                                                        <ul class="list-group">
                                                            <li class="list-group-item"><strong>Calle:</strong> {{ $address->street }}</li>
                                                            <li class="list-group-item"><strong>Número:</strong> {{ $address->number }}</li>
                                                            <li class="list-group-item"><strong>Ciudad:</strong> {{ $address->city }}</li>
                                                            <li class="list-group-item"><strong>Otra Descripción:</strong> {{ $address->other_description }}</li>
                                                            <li class="list-group-item"><strong>País:</strong> {{ $address->country }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="{{ route('address.delete', $address->id) }}" class="btn btn-danger mb-2">Eliminar Dirección</a>
                                                        <a class="btn btn-primary" href="{{ route('address.edit', $address) }}">Editar Dirección</a>
                                                    </div>
                                                </div>
                                            @empty
                                                <p>No hay direcciones disponibles.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                    
                                </div>
                                <a href="{{ route('address.create') }}" class="btn btn-danger">Crear Dirección</a>
                            {{-- @empty
                                <h4>No tiene ninguna dirección registrada.</h4>
                                <a href="{{ route('address.create') }}" class="btn btn-danger col-4 mx-auto">Crear Dirección</a>
                                
                            @endforelse
                             --}}
                            <div class="d-flex justify-content-between">
                                <br>
                                {{ $addresses->links() }}
                                <br>
                                <a href="{{ url('/home') }}" class="btn btn-danger btn-fit-content btn-lg">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
