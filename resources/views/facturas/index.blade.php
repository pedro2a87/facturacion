@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Facturas Generadas') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success fw-bold" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <a href="{{route('facturas.generar')}}" class="btn btn-primary">Generar Facturas</a>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Cliente</th>
                          <th scope="col">Impuesto</th>
                          <th scope="col">Total Facturado</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($facturas as $factura)
                        <tr>
                          <th scope="row">{{$factura->id}}</th>
                          <td>{{$factura->user->name}}</td>
                          <td>{{$factura->impuesto}}</td>
                          <td>{{$factura->total}}</td>
                          <td>
                              <a href="{{route('facturas.show', $factura)}}">Detalles</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{$facturas->links()}}
                </div>
                <div class="card-footer">
                    <a href="{{route('home')}}" class="btn btn-secondary">Panel Principal</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection