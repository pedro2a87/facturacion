<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Models\Compra;
use App\Models\Producto;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('compras.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompraRequest $request)
    {
        $producto    = Producto::find($request->producto);
        $precio_base = round($producto->precio / ($producto->impuesto/100 + 1),2);
        $impuesto    = $producto->precio - $precio_base;
        Compra::create([
            'user_id'     => auth()->user()->id,
            'producto_id' => $request->producto,
            'impuesto'    => $impuesto,
            'monto'       => $producto->precio,
        ]);

        session()->flash('status', 'Compra Realizada!');
        return redirect()->route('compras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompraRequest  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompraRequest $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
