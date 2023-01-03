<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articulos = Articulo::all();
        return response()->json($articulos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $request->validate([
            'nombre' => 'required',
            'cedula'=> 'required|unique:articulos,cedula',
            'descripcion'=> 'required'

        ]); */
        $articulo = new Articulo();
        $articulo->nombre= $request->nombre;
        $articulo->cedula = $request->cedula;
        $articulo->descripcion = $request->descripcion;
        $articulo->precio = $request->precio;
        $articulo->stock=$request->stock;

        $articulo->save();
        $data = [
            'message' => 'Articulos creados correctamente',
            'Articulo' => $articulo
        ];

        return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return response()->json($articulo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        /* $request->validate([
            'nombre' => 'required',

            "cedula"=> "required|unique:articulos,cedula,".$this->route('articulos')->id,
            'descripcion'=> 'required'

        ]); */
        //$articulo = Articulo::findOrFail($request->id);
        $articulo->nombre= $request->nombre;
        $articulo->cedula = $request->cedula;
        $articulo->descripcion = $request->descripcion;
        $articulo->precio = $request->precio;
        $articulo->stock=$request->stock;

        $articulo->save();
        $data = [
            'message' => 'Articulos Actualizado correctamente',
            'Articulo' => $articulo
        ];
        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
            $data = [
                'message' => 'Articulo eliminado :( ' ,
                'Articulo' => $articulo
        ];

        return response()->json($data);
    }
}
