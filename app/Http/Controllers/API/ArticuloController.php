<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarArticuloRequest;
use App\Http\Requests\GuardarArticuloRequest;
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
    public function store(GuardarArticuloRequest $request)
    {

       Articulo::create($request->all());
       /*  $data = [
            'message' => 'Articulos creados correctamente',
            'Articulo' => $request
        ]; */

        return response()->json([
            'res'=> true,
            'msg'=> 'Articulo guardado correctamente'
        ],200);

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
    public function update(ActualizarArticuloRequest $request, Articulo $articulo)
    {



        $articulo->update($request->all());
        /* $data = [
            'message' => 'Articulos Actualizado correctamente',
            'Articulo' => $articulo
        ]; */
        return response()->json([
            'res'=> true,
            'msg'=> 'Articulo actualizado correctamente'
        ],200);

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
