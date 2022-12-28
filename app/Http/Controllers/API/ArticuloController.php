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
        return Articulo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'cedula'=> 'required|unique:articulos,cedula',
            'descripcion'=> 'required'

        ]);
        $articulo = new Articulo();
        $articulo->nombre= $request->nombre;
        $articulo->cedula = $request->cedula;
        $articulo->descripcion = $request->descripcion;
        $articulo->precio = $request->precio;
        $articulo->stock=$request->stock;

        $articulo->save();

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            //'cedula'=> 'required|unique:articulos,cedula',
            "cedula"=> "required|unique:articulos,cedula,".$this->route('articulos')->id,
            'descripcion'=> 'required'

        ]);
        $articulo =  Articulo::findOrFail($request->id);
        $articulo->nombre= $request->nombre;
        $articulo->cedula = $request->cedula;
        $articulo->descripcion = $request->descripcion;
        $articulo->precio = $request->precio;
        $articulo->stock=$request->stock;

        $articulo->save();
        return $articulo;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $articulo = $articulo=Articulo::destroy($request->id);
        return $articulo;
    }
}
