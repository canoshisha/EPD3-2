@extends('template_admin')
@section('contenido')
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
        <h1>Lista de Direcciones</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Street</th>
                    <th>Number</th>
                    <th>City</th>
                    <th>Other Description</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $address)
                    <tr>
                        <td>{{ $address->street }}</td>
                        <td>{{ $address->number }}</td>
                        <td>{{ $address->city }}</td>
                        <td>{{ $address->other_description }}</td>
                        <td>{{ $address->country }}</td>
                        <td>
                            <a href="{{ route('address.delete', $address->id) }}" class="btn btn-danger ">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $addresses->links() }}
    </div>
@endsection
