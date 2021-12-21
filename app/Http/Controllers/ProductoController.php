<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Producto;
use App\Models\Img_Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
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
        $productos = Producto::all();
        //return $producto;
        //return compact('producto');
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estados['estados'] = Estado::all('id_estado', 'desc_estado');
        $categorias['categorias'] = Categoria::select('id_ctg_producto', 'desc_categoria')->where('id_estado', '=', 1)->get();

        return view('producto.create', $estados, $categorias);
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
            'txtCodPro' => 'required|string|max:100',
            'txtDescPro' => 'required|string|max:100',
            'txtStockPro' => 'required|integer|max:1000',
            'txtVlrPro' => 'required|numeric',
            'txtIdctgPro' => 'required|integer|max:1000',
            'txtEstado' => 'required|integer|max:2'
        ];
        $mesajerror = [
            'txtCodPro.required' => 'Es Obligatorio',
            'txtDescPro.required' => 'Es Obligatorio',
            'txtStockPro.required' => 'Es Obligatorio',
            'txtVlrPro.required' => 'Es Obligatorio',
            'txtIdctgPro.required' => 'Es Obligatorio',
            'txtIdctgPro.integer' => 'Seleccione una categoria',
            'txtEstado.required' => 'Es Obligatorio',
            'txtEstado.integer' => 'Seleccione un estado',
        ];

        $this->validate($request, $datosvalida, $mesajerror);


        $producto = new Producto();
        $imgProducto = new Img_Producto();

        $producto->cod_producto = $request->txtCodPro;
        $producto->desc_producto = $request->txtDescPro;
        $producto->stock_producto = $request->txtStockPro;
        $producto->valor_producto = $request->txtVlrPro;
        //$producto->fecha_creacion = $request->txtFechCrea;
        $producto->fecha_creacion = Carbon::now();
        $producto->id_estado = $request->txtEstado;
        $producto->id_ctg_producto = $request->txtIdctgPro;
        //$producto->id_usuario = $request->txtIdUsu;
        $producto->save();
        $imgProducto =  request()->except('_token', 'txtCodPro', 'txtDescPro', 'txtStockPro', 'txtVlrPro', 'txtEstado', 'txtIdctgPro', 'txtImg');
        if ($request->hasFile('txtImg')) {
            $imgProducto['descr_img'] = $request->file('txtImg')->store('uploads', 'public');
            /* $imgProducto['id_producto'] = 5 ; */
            $idpructo = Producto::latest('id_producto')->first();
            $imgProducto['id_producto'] = $idpructo->id_producto;
        }

        //$imgProducto->save();
        Img_Producto::insert($imgProducto);
        /* $producto->save(); */

        //return "Se creo Producto". $producto;
        return redirect('producto')->with('mensaje', 'Registro Creado');
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
        $productos = Producto::findOrFail($id);
        $estados = Estado::all('id_estado', 'desc_estado');
        $categorias = Categoria::all('id_ctg_producto', 'desc_categoria');

        return view('producto.edit', compact('productos', 'estados', 'categorias'));
        //return view = ('producto.index',compact('productos'));
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
            'txtCodPro' => 'required|string|max:100',
            'txtDescPro' => 'required|string|max:100',
            'txtStockPro' => 'required|integer|max:1000',
            'txtVlrPro' => 'required|numeric',
            'txtIdctgPro' => 'required|integer|max:1000',
            'txtEstado' => 'required|integer|max:2'
        ];
        $mesajerror = [
            'txtCodPro.required' => 'Es Obligatorio',
            'txtDescPro.required' => 'Es Obligatorio',
            'txtStockPro.required' => 'Es Obligatorio',
            'txtVlrPro.required' => 'Es Obligatorio',
            'txtIdctgPro.required' => 'Es Obligatorio',
            'txtIdctgPro.integer' => 'Seleccione una categoria',
            'txtEstado.required' => 'Es Obligatorio',
            'txtEstado.integer' => 'Seleccione un estado',
        ];

        $this->validate($request, $datosvalida, $mesajerror);

        //$producto = new Producto();
        $producto = Producto::findOrFail($id);

        $producto->cod_producto = $request->txtCodPro;
        $producto->desc_producto = $request->txtDescPro;
        $producto->stock_producto = $request->txtStockPro;
        $producto->valor_producto = $request->txtVlrPro;
        //$producto->fecha_creacion = $request->txtFechCrea;
        //$producto->fecha_creacion = Carbon::now();
        $producto->id_estado = $request->txtEstado;
        $producto->id_ctg_producto = $request->txtIdctgPro;
        //$producto->id_usuario = $request->txtIdUsu;

        $producto->save();
        //Producto::where('id_producto','=',$id)->update($producto);


        $impProducto = Img_Producto::where('id_producto', '=', $producto->id_producto)->first();

        if (isset($impProducto)) {
            # code...
            $imgProducto =  request()->except('_token', 'txtCodPro', 'txtDescPro', 'txtStockPro', 'txtVlrPro', 'txtEstado', 'txtIdctgPro', 'txtImg', '_method');
            if ($request->hasFile('txtImg')) {
                //$imagen=Img_Producto::findOrFail($impProducto);
                //Storage::delete(['public/uploads/', $imagen->descr_img]);
                # code...
                Storage::delete(['public/' . $impProducto->descr_img]);


                $imgProducto['descr_img'] = $request->file('txtImg')->store('uploads', 'public');
                /* $imgProducto['id_producto'] = 5 ; */
                // $idpructo = Producto::latest('id_producto')->first();
                //$imgProducto['id_producto'] = $idpructo->id_producto;
            }

            //$imgProducto->save();
            //Img_Producto::insert($imgProducto);
            Img_Producto::where('id_img_producto', '=', $impProducto->id_img_producto)->update($imgProducto);
            /* $producto->save(); */
        } else {
            $imgProducto =  request()->except('_token', 'txtCodPro', 'txtDescPro', 'txtStockPro', 'txtVlrPro', 'txtEstado', 'txtIdctgPro', 'txtImg', '_method');
            if ($request->hasFile('txtImg')) {
                $imgProducto['descr_img'] = $request->file('txtImg')->store('uploads', 'public');
                /* $imgProducto['id_producto'] = 5 ; */
                //$idpructo = Producto::latest('id_producto')->first();
                $imgProducto['id_producto'] = $id;
            }

            //$imgProducto->save();
            Img_Producto::insert($imgProducto);
            /* $producto->save(); */
        }


        //return "Se creo Producto". $producto;
        return redirect('producto')->with('mensaje', 'Registro Creado');
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
        $producto = Producto::findOrFail($id);
        /* $impProducto = Img_Producto::select('select * from img_producto where id_producto = ?', [$producto->id_producto]); */
        /* $impProducto = Img_Producto::select('descr_img')->where('id_producto','=',$producto->id_producto)->get(); */
        $impProducto = Img_Producto::where('id_producto', '=', $producto->id_producto)->first();
        if (isset($impProducto->descr_img)) {
            # code...
            Storage::delete(['public/' . $impProducto->descr_img]);
            Img_Producto::destroy($impProducto->id_img_producto);
            Producto::destroy($id);
        } else {
            //Img_Producto::destroy($impProducto->id_img_producto);
            Producto::destroy($id);
        }
        return redirect('producto')->with('mensaje', 'Registro Eliminado' . isset($impProducto->descr_img));
    }
}
