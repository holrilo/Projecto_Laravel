<?php

namespace App\Http\Controllers;

use App\Models\gasto;
use App\Models\Ingreso;
use App\Models\tipo_gasto;
use App\Models\Tipo_ingreso;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GastosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gastos = gasto::all();
        return view('gastos.index', compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipogastos = tipo_gasto::all();
        $ingresos = Ingreso::all();
        return view('gastos.create', compact('tipogastos', 'ingresos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosvalida = [
            'txtTgasto' => 'required|integer ',
            'txtDescgasto' => 'required|string|max:50',
            'txtVlrgasto' => 'required ',
            'txtFgasto' => 'required|date ',
            /* 'txtIngre' => 'required|string|max:100 ', */
        ];

        $mesajerror = [
            'txtTgasto.required' => 'El Campo es Obligatorio',
            'txtTgasto.integer' => 'El Campo es Obligatorio',
            'txtDescgasto.required' => 'El Campo es Obligatorio',
            'txtVlrgasto.required' => 'El Campo es Obligatorio',
            'txtFgasto.required' => 'El Campo es Obligatorio',
            /* 'txtIngre.required' => 'El Campo es Obligatorio', */
        ];

        $this->validate($request, $datosvalida, $mesajerror);

        $gasto = new gasto();

        $gasto->id_tipo_gasto = $request->txtTgasto;
        $gasto->desc_gasto = $request->txtDescgasto;
        $gasto->valor_gasto = $request->txtVlrgasto;
        $gasto->f_creacion_gasto = Carbon::now();
        $gasto->f_gasto = $request->txtFgasto;
        $gasto->obs_gasto = $request->txtObsev;
        $gasto->id_ingreso = $request->txtIngre;

        $gasto->save();

        return redirect('gastos')->with('mensaje', 'Registro Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $gastos = gasto::findOrfail($id);
        $tipogastos = tipo_gasto::all();
        $ingresos = Ingreso::all();
        return view('gastos.edit',compact('gastos','tipogastos','ingresos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosvalida = [
            'txtTgasto' => 'required|integer ',
            'txtDescgasto' => 'required|string|max:50',
            'txtVlrgasto' => 'required ',
            'txtFgasto' => 'required|date ',
            /* 'txtIngre' => 'required|string|max:100 ', */
            /* 'txtIngre' => 'integer', */
        ];

        $mesajerror = [
            'txtTgasto.required' => 'El Campo es Obligatorio',
            'txtTgasto.integer' => 'El Campo es Obligatorio',
            'txtDescgasto.required' => 'El Campo es Obligatorio',
            'txtVlrgasto.required' => 'El Campo es Obligatorio',
            'txtFgasto.required' => 'El Campo es Obligatorio',
            /* 'txtIngre.required' => 'El Campo es Obligatorio', */
            /* 'txtIngre.integer' => 'El campo solo es numerico' */
        ];

        $this->validate($request, $datosvalida, $mesajerror);

        //$gasto = new gasto();

        $gasto['id_tipo_gasto'] = $request->txtTgasto;
        $gasto['desc_gasto'] = $request->txtDescgasto;
        $gasto['valor_gasto'] = $request->txtVlrgasto;
        //$gasto['f_creacion_gasto'] = Carbon::now();
        $gasto['f_gasto'] = $request->txtFgasto;
        $gasto['obs_gasto'] = $request->txtObsev;
        $gasto['id_ingreso'] = $request->txtIngre;

        //$gasto->save();
        gasto::where('id_gasto', '=', $id)->update($gasto);

        return redirect('gastos')->with('mensaje', 'Registro Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $gastos = gasto::findOrfail($id);
        $gastos->destroy($id);
        return redirect('gastos')->with('mensaje','Registro Eliminado');
    }
}
