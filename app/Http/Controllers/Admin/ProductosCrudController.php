<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;

class ProductosCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.create');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new producto();

        $request->validate([
            'nombre' => 'required',
            'suplidor' => 'required',
            'descripcion' => 'required',
            'modelo' => 'required',
            'categoria' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'file' => 'required'
        ]);

        $producto->nombre = $request->nombre;
        $producto->suplidor = $request->suplidor;
        $producto->descripcion = $request->descripcion;
        $producto->modelo = $request->modelo;
        $producto->categoria = $request->categoria;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
       
       if ($request->hasFile('file')) { 

            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/productos/', $filename);
            $producto->foto = $filename;
        }

        $producto->save();
        
        $producto = producto::all();
        
        return redirect()->route('admin.productos',compact('producto'));
        
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
