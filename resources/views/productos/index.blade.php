@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Productos') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success fw-bold" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @role('Admin')
                     <a href="{{route('productos.create')}}" class="btn btn-primary">Crear Producto</a>
                     @endrole

                     <p class="fw-bold mt-3 mb-3">Nota: El precio de los productos incluye el impuesto señalado</p>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Impuesto</th>
                          @role('Admin')
                          <th scope="col">Acciones</th>
                          @endrole
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <th scope="row">{{$producto->id}}</th>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->precio}}</td>
                                <td>{{$producto->impuesto}}%</td>
                                @role('Admin')
                                <td>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <a href="{{route('productos.edit', $producto)}}" class="btn btn-warning btn-sm">Editar</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <form action="{{route('productos.destroy', $producto)}}" method="POST" class="form-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="">Eliminar</button>
                                    </form>
                                    </div>
                                    </div>
                                </td>
                                @endrole
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <a href="{{route('home')}}" class="btn btn-secondary">Panel Principal</a>
                    <a href="{{route('compras.index')}}" class="btn btn-primary">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Eliminar Producto?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Esta Accion no se puede revertir.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" form="producto-delete">Eliminar</button>
      </div>
    </div>
  </div>
</div>
@endsection