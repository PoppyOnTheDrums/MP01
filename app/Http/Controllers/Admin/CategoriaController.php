<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = categoria::all();
        return view('admin.categoria',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoriacreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorias = new categoria();

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $categorias->nombre = $request->nombre;
        $categorias->descripcion = $request->descripcion;

       

        $categorias->save();
         
        $categorias = categoria::all();
         
        return redirect()->route('admin.categoria',compact('categorias'))->with('Info','La categorria se agrego correctamente');
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
    public function edit(categoria $categorias)
    {
        return view('admin.categoriaedit', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $categorias = categoria::find($id);
    
        $categorias->nombre = $request->nombre;
        $categorias->descripcion = $request->descripcion;


       
        $categorias->update();
    
         
        return redirect()->route('admin.categoria',compact('categorias'))->with('Info','La categorria se edito correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,int $id)
    {
        $categorias = categoria::find($id);
        $categorias->delete();
        return redirect()->route('admin.categoria',compact('categorias'))->with('Info','La categorria se Elimino correctamente');
    }
}
