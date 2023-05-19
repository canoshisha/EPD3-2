@extends('welcome')
@section('title', 'Crear direcciones')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h3>Crear Dirección</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('address.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="street">Calle</label>
                                <input type="text" name="street" id="street" class="form-control"
                                    placeholder="Calle" value="{{old('street')}}">
                                @error('street')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="number">Número</label>
                                <input type="number" name="number" id="number" class="form-control"
                                    placeholder="Número" value="{{old('number')}}">
                                @error('number')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="city">Ciudad</label>
                                <input type="text" name="city" id="city" class="form-control"
                                    placeholder="Ciudad" value="{{old('city')}}">
                                @error('city')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="other_description">Otra Descripción</label>
                                <textarea name="other_description" id="other_description" class="form-control" placeholder="Otra Descripción">{{old('other_description')}}</textarea>
                                @error('other_description')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="country">País</label>
                                <input type="text" name="country" id="country" class="form-control" placeholder="País" value="{{old('country')}}">
                                @error('country')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('address.read') }}" class="btn btn-danger">Volver</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
