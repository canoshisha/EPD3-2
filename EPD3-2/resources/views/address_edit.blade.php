@extends('auth.template')
@section('title', 'Crear direcciones')

@section('content')
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">
                        <h3>Editar Dirección</h3>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                        <form method="POST" action="{{ route('address.update',$address) }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="street">Calle</label>
                                <input type="text" name="street" id="street" class="form-control" value="{{$address->street}}">
                                @error('street')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="number">Número</label>
                                <input type="text" name="number" id="number" class="form-control" value="{{$address->number}}">
                                @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="city">Ciudad</label>
                                <input type="text" name="city" id="city" class="form-control" value="{{$address->city}}">
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="other_description">Otra Descripción</label>
                                <textarea name="other_description" id="other_description" class="form-control" >{{$address->other_description}}</textarea>
                                @error('other_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="country">País</label>
                                <input type="text" name="country" id="country" class="form-control" value="{{$address->country}}">
                                @error('country')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                    
                            <hr>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('address.read') }}" class="btn btn-danger col-4 mx-auto">Volver</a>
                        </form>  
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
