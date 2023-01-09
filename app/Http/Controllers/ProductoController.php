<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{

    public function __construct(){
        $this->middleware('role:Admin', ['except'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        $precio_base = $request->precio;
        $impuesto    = $request->impuesto / 100;
        $precio      = round($precio_base + $precio_base * $impuesto, 2);

        Producto::create([
            'nombre'   =>$request->nombre,
            'precio'   =>$precio,
            'impuesto' =>$request->impuesto,
        ]);

        session()->flash('status', 'Producto Creado!');
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductoRequest  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->nombre   = $request->nombre;
        $producto->precio   = $request->precio;
        $producto->impuesto = $request->impuesto;

        $producto->save();

        session()->flash('status', 'Producto Actualizado!');
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        try {
            $producto->delete();
            session()->flash('status', 'Producto Eliminado!');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('status', 'No se puede Eliminar este Producto');
        }catch (Exception $e) {
            session()->flash('status', 'Error inesperado!. Consulte al administrador');
        }
        return redirect()->route('productos.index');
    }
}
