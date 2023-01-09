@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Productos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     
                    <form action="{{route('productos.update', $producto)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label>Nombre</label>
                        <input type="text" name="nombre" value="{{old('nombre', $producto->nombre)}}">
                        @error('nombre')
                            <br>
                            <small class="text-danger">{{$message}}</small>
                        @enderror

                        <br>

                        <label>Precio</label>
                        <input type="text" name="precio" value="{{old('precio', $producto->precio)}}">
                        @error('precio')
                            <br>
                            <small class="text-danger">{{$message}}</small>
                        @enderror

                        <br>

                        <label>Impuesto(%)</label>
                        <input type="text" name="impuesto" value="{{old('impuesto', $producto->impuesto)}}">
                        @error('impuesto') 
                        <br>
                            <small class="text-danger">{{$message}}</small>
                        @enderror

                        <br>

                        <button type="submit">Actualizar</button>
                        <a href="{{route('productos.index')}}" class="btn">Cancelar</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection