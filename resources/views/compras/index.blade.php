@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Compras') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success fw-bold" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Selecione el producto que desea adquirir</h3>
                    <form action="{{route('compras.store')}}" method="POST" id="compras-store">
                        @csrf
                        <select class="form-control" name="producto">
                            @foreach($productos as $item)
                                <option value="{{$item->id}}">{{$item->nombre}} - {{ $item->precio }}$</option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" form="compras-store">Comprar</button>
                    <a href="{{route('home')}}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection