@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">{{ __('Detalles de Facturacion') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="fw-bold">Cliente: {{$factura->user->name}}</h3>
                    <hr>
                    <h5 class="fw-bold mb-4">Detalles de la Compra</h5>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Descripcion</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Impuesto</th>
                          @php //<th scope="col">Fecha</th> @endphp
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($compras as $compra)
                        <tr>
                          <td>{{$compra->producto->nombre}}</td>
                          <td>{{$compra->producto->precio}}</td>
                          <td>{{$compra->producto->impuesto}}%</td>
                          @php //<td>{{$compra->created_at}}</td>@endphp
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="mt-4 pt-1">
                        <h4 class="fw-bold">Monto Total: {{$factura->total}}</h4>
                        <h4 class="fw-bold">Impuesto Total: {{$factura->impuesto}}</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('facturas.index')}}" class="btn btn-secondary">Volver a Facturas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection