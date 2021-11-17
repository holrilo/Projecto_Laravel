<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Estado;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Symfony\Contracts\Service\Attribute\Required;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$stados = DB::table('users')
        //$categorias = Categoria::all();
        $categorias['categorias'] = Categoria::select('categoria.id_ctg_producto','categoria.desc_categoria','estado.desc_estado')->join('estado','estado.id_estado','=','categoria.id_estado')->get();
        
        //return $categoria;
        //return view('categorias.index',compact('categorias'));
        return view('categorias.index',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados['estados'] = Estado::all('id_estado','desc_estado');

        return view('categorias.create', $estados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
/*         $request->validate([
            'txtCtgr'=>'required',
            'txtEstCtgr'=>'required'
        ]); */

        $datosvalida=[
            'txtCtgr'=>'required|string|max:100',
            'txtEstCtgr'=>'required|integer'
        ];
        $mesajerror=[
            //'required'=>'El Campo :attribute es obligatorio'
            'txtCtgr.required' => 'La categoria es obligatoria',
            'txtEstCtgr.required' => 'Debe Ingresar el estado',
            'txtEstCtgr.integer' => 'Debe Ingresar el estado'
        ];

        $this->validate($request,$datosvalida,$mesajerror);
        
        $categoria = new Categoria();
        $categoria->desc_categoria = $request->txtCtgr;
        $categoria->id_estado = $request->txtEstCtgr;



        $categoria->save();
        //return "Se creo Categoria". $categoria;
        return redirect('categoria')->with('mensaje', 'Registros creado ');
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
        $categorias = Categoria::findOrFail($id);
        $estados = Estado::all('id_estado','desc_estado');
        return view('categorias.edit',compact('categorias','estados'));
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

        $datosvalida=[
            'txtCtgr'=>'required|string|max:100',
            'txtEstCtgr'=>'required|integer'
        ];
        $mesajerror=[
            //'required'=>'El Campo :attribute es obligatorio'
            'txtCtgr.required' => 'La categoria es obligatoria',
            'txtEstCtgr.required' => 'Debe Ingresar el estado',
            'txtEstCtgr.integer' => 'Debe Ingresar el estado'
        ];

        $this->validate($request,$datosvalida,$mesajerror);

        $categoria = Categoria::findOrFail($id);
        $categoria->desc_categoria = $request->txtCtgr;
        $categoria->id_estado = $request->txtEstCtgr;
        $categoria->save();
        //return "Se edito los siguientes tados". $categoria;
        return redirect('categoria')->with('mensaje', 'Registros Editado ');
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
    }
}
