<?php

namespace App\Http\Controllers;

use App\Models\gasto;
use App\Models\gastosa;
use App\Models\Ingreso;
use App\Models\tipo_gasto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GastosaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        //
        $gastos = gastosa::all();
        return view('gastosa.index', compact('gastos'));
    }

    public function create()
    {
        //
        $tipogastos = tipo_gasto::all();
        $ingresos = Ingreso::all();
        return view('gastosa.create', compact('tipogastos', 'ingresos'));
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

        $gasto = new gastosa();

        $gasto->id_tipo_gasto = $request->txtTgasto;
        $gasto->desc_gasto = $request->txtDescgasto;
        $gasto->valor_gasto = $request->txtVlrgasto;
        $gasto->f_creacion_gasto = Carbon::now();
        $gasto->f_gasto = $request->txtFgasto;
        $gasto->obs_gasto = $request->txtObsev;
        $gasto->id_ingreso = $request->txtIngre;

        $gasto->save();

        return redirect('gastosa')->with('mensaje', 'Registro Creado');
    }
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
        $gastos = gastosa::findOrfail($id);
        $tipogastos = tipo_gasto::all();
        $ingresos = Ingreso::all();
        return view('gastosa.edit',compact('gastos','tipogastos','ingresos'));
    }

    public function pagar($id)
    {
        //
        $gastos = gastosa::findOrfail($id);
        $tipogastos = tipo_gasto::all();
        $ingresos = Ingreso::all();
        return view('gastosa.pagar',compact('gastos','tipogastos','ingresos'));
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
            //'txtIngre' => 'integer',
        ];

        $mesajerror = [
            'txtTgasto.required' => 'El Campo es Obligatorio',
            'txtTgasto.integer' => 'El Campo es Obligatorio',
            'txtDescgasto.required' => 'El Campo es Obligatorio',
            'txtVlrgasto.required' => 'El Campo es Obligatorio',
            'txtFgasto.required' => 'El Campo es Obligatorio',
            /* 'txtIngre.required' => 'El Campo es Obligatorio', */
            //'txtIngre.integer' => 'El campo solo es numerico'
        ];

        $this->validate($request, $datosvalida, $mesajerror);

        if ($request->inpagar == 'Pagar') {
            # code...
            $this->validate($request, $datosvalida, $mesajerror);

            $gastoa = new gasto();
    
            $gastoa->id_tipo_gasto = $request->txtTgasto;
            $gastoa->desc_gasto = $request->txtDescgasto;
            $gastoa->valor_gasto = $request->txtVlrgasto;
            $gastoa->f_creacion_gasto = Carbon::now();
            $gastoa->f_gasto = $request->txtFgasto;
            $gastoa->obs_gasto = $request->txtObsev;
            $gastoa->id_ingreso = $request->txtIngre;
    
            $gastoa->save();
            return redirect('gastos')->with('mensaje', 'Registro Pagado');
        }
        //$gasto = new gasto();

        $gasto['id_tipo_gasto'] = $request->txtTgasto;
        $gasto['desc_gasto'] = $request->txtDescgasto;
        $gasto['valor_gasto'] = $request->txtVlrgasto;
        //$gasto['f_creacion_gasto'] = Carbon::now();
        $gasto['f_gasto'] = $request->txtFgasto;
        $gasto['obs_gasto'] = $request->txtObsev;
        $gasto['id_ingreso'] = $request->txtIngre;

        //$gasto->save();
        gastosa::where('id_gasto', '=', $id)->update($gasto);

        return redirect('gastosa')->with('mensaje', 'Registro Editado');
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
        $gastos = gastosa::findOrfail($id);
        $gastos->destroy($id);
        return redirect('gastosa')->with('mensaje','Registro Eliminado');
    }
}
