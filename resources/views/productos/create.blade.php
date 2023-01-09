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
                     
                    <form action="{{route('productos.store')}}" method="POST">
                        @csrf
                        <label>Nombre</label>
                        <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control">
                        @error('nombre')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <br>
                        <label>Precio (Sin el impuesto)</label>
                        <input type="text" name="precio" value="{{old('precio')}}" class="form-control">
                        @error('precio')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <br>
                        <label>Impuesto(%)</label>
                        <input type="text" name="impuesto" value="{{old('impuesto')}}" class="form-control">
                        @error('impuesto')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary">Crear</button>
                        <a href="{{route('productos.index')}}" class="btn btn-secondary">Cancelar</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection