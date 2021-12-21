<?php

namespace App\Http\Controllers;

use App\Models\gasto;
use App\Models\Ingreso;
use App\Models\Tipo_ingreso;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IngresosController extends Controller
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
    public function index(Request $request)
    {
        //
        $bdesc = $request->get('txtBdesc');
        if (isset($bdesc)) {
            # code...
            $bdesc = $request->get('txtBdesc');

            $ingresos = Ingreso::descripcion($bdesc)->get();
        } else {
                 //ordenar ascendente sortBy
                //ordenar descendente sortByDesc
            $ingresos = Ingreso::all()->sortBy('f_ingreso');
        }


        // esta opcion es para buscar los ingresos con sus detalles de gasto en una misma consulta 
        // $ingresos = Ingreso::leftjoin('gastos','ingresos.id_ingreso', '=' , 'gastos.id_ingreso')->get();




        return view('ingresos.index', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipoingresos = Tipo_ingreso::all();
        return view('ingresos.create', compact('tipoingresos'));
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
            'txtTingreso' => 'required|integer ',
            'txtDescingreso' => 'required|string|max:50',
            'txtVlringreso' => 'required ',
            'txtFingreso' => 'required|date ',
            /* 'txtIngre' => 'required|string|max:100 ', */
        ];

        $mesajerror = [
            'txtTingreso.required' => 'El Campo es Obligatorio',
            'txtTingreso.integer' => 'El Campo es Obligatorio',
            'txtDescingreso.required' => 'El Campo es Obligatorio',
            'txtVlringreso.required' => 'El Campo es Obligatorio',
            'txtFingreso.required' => 'El Campo es Obligatorio',
            /* 'txtIngre.required' => 'El Campo es Obligatorio', */
        ];

        $this->validate($request, $datosvalida, $mesajerror);

        $ingreso = new Ingreso();

        $ingreso->desc_ingreso = $request->txtDescingreso;
        $ingreso->valor_ingreso = $request->txtVlringreso;
        $ingreso->f_creacion_ingreso = Carbon::now();
        $ingreso->f_ingreso = $request->txtFingreso;
        $ingreso->obs_ingreso = $request->txtObsev;
        $ingreso->id_tipo_ingreso = $request->txtTingreso;

        $ingreso->save();

        return redirect('ingresos')->with('mensaje', 'Registro Creado');
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
        $gastos = gasto::where('id_ingreso', '=', $id)->get();
        $ingresos = Ingreso::findOrfail($id);

        // $gastos = gasto::find($id);
        //  $gastos = gasto::firstWhere($id);

        //$tipogastos = tipo_gasto::all();
        //$ingresos = Ingreso::all();

        return view('ingresos.show', compact('gastos', 'ingresos'));
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
        $ingresos = Ingreso::findOrfail($id);
        $tipoingresos = Tipo_ingreso::all();
        return view('ingresos.edit', compact('ingresos', 'tipoingresos'));
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
            'txtTingreso' => 'required|integer ',
            'txtDescingreso' => 'required|string|max:50',
            'txtVlringreso' => 'required ',
            'txtFingreso' => 'required|date ',
            /* 'txtIngre' => 'required|string|max:100 ', */
        ];

        $mesajerror = [
            'txtTingreso.required' => 'El Campo es Obligatorio',
            'txtTingreso.integer' => 'El Campo es Obligatorio',
            'txtDescingreso.required' => 'El Campo es Obligatorio',
            'txtVlringreso.required' => 'El Campo es Obligatorio',
            'txtFingreso.required' => 'El Campo es Obligatorio',
            /* 'txtIngre.required' => 'El Campo es Obligatorio', */
        ];

        $this->validate($request, $datosvalida, $mesajerror);

        $ingreso['desc_ingreso'] = $request->txtDescingreso;
        $ingreso['valor_ingreso'] = $request->txtVlringreso;
        //$ingreso->['f_creacion_ingreso'] = Carbon::now();
        $ingreso['f_ingreso'] = $request->txtFingreso;
        $ingreso['obs_ingreso'] = $request->txtObsev;
        $ingreso['id_tipo_ingreso'] = $request->txtTingreso;

        Ingreso::where('id_ingreso', '=', $id)->update($ingreso);

        return redirect('ingresos')->with('mensaje', 'Registro Editado');
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
        $ingresos = Ingreso::findOrfail($id);
        $ingresos->destroy($id);
        return redirect('ingresos')->with('mensaje', 'Registro Eliminado');
    }
}
