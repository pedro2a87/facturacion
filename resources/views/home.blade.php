@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel Principal') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success fw-bold" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center">
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Compras</h5>
                            <p class="card-text">Realice la compra de sus productos favoritos</p>
                            <a href="{{route('compras.index')}}" class="btn btn-primary">Comprar</a>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Productos</h5>
                            <p class="card-text">Consulte la información de los productos disponibles</p>
                            <a href="{{route('productos.index')}}" class="btn btn-primary">Ver Productos</a>
                          </div>
                        </div>
                      </div>
                      @role('Admin')
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Facturas</h5>
                            <p class="card-text">Consulte la Informacón de las Facturas Generadas</p>
                            <a href="{{route('facturas.index')}}" class="btn btn-primary">Ver Facturas</a>
                          </div>
                        </div>
                      </div>
                      @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
