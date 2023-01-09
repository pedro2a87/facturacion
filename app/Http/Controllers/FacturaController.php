<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacturaRequest;
use App\Http\Requests\UpdateFacturaRequest;
use App\Models\Compra;
use App\Models\Factura;
use App\Models\User;

class FacturaController extends Controller
{
    public function __construct(){
        $this->middleware('role:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::paginate(10);
        $compras  = Compra::where('factura', NULL)->get();

        if($compras->count() > 0 ){
            session()->flash('status', "Existen {$compras->count()} compra(s) sin Facturas");
        }
        return view('facturas.index', compact('facturas'));
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
     * @param  \App\Http\Requests\StoreFacturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacturaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        session()->flash('status', "");
        $compras = Compra::where('user_id', $factura->user_id)->where('factura', '=', $factura->id)->orderBy('created_at', 'ASC')->get();
        return view('facturas.show', compact('factura','compras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFacturaRequest  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacturaRequest $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }

    /**
     * Genera las facturas de compras pendientes.
     *
     * @return \Illuminate\Http\Response
     */
    public function generar(){
        $clientes = User::select('users.id')
            ->join('compras', 'users.id', '=', 'compras.user_id')
            ->where('compras.factura', NULL)->distinct()->get();

        if($clientes->isEmpty()){
            session()->flash('status', 'No Hay Facturas por Generar!');
            return redirect()->route('facturas.index');
        }
        foreach ($clientes as $cliente){
            $compras  = $cliente->compras()->select('id','impuesto','monto', 'factura')->where('factura', NULL)->get();
            $factura = Factura::create([
                'user_id'   => $cliente->id,
                'impuesto'  => $compras->sum('impuesto'),
                'total'     => $compras->sum('monto'),
            ]);

            foreach($compras as $compra){
                $compra->update(['factura' => $factura->id]);
            }
        }
        session()->flash('status', 'Facturas Generadas!');
        return redirect()->route('facturas.index');
    }
}
