<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\suplidore;
use Illuminate\Http\Request;

class SuplidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplidor = suplidore::all();
        return view('admin.suplidor',compact('suplidor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suplidorcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suplidor = new suplidore();

        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        $suplidor->nombre = $request->nombre;
        $suplidor->telefono = $request->telefono;
        $suplidor->direccion = $request->direccion;
       

        $suplidor->save();
         
        $suplidor = suplidore::all();
         
        return redirect()->route('admin.suplidor',compact('suplidor'))->with('Info','Se Agrego el Suplidor correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(suplidore $suplidor)
    {
        return view('admin.suplidoredit', compact('suplidor'));
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
        $suplidor = suplidore::find($id);
    
        $suplidor->nombre = $request->nombre;
        $suplidor->telefono = $request->telefono;
        $suplidor->direccion = $request->direccion;

       
        $suplidor->update();
    
         
        return redirect()->route('admin.suplidor',compact('suplidor'))->with('Info','Se Actualizo el Suplidor correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,int $id)
    {
        $suplidor = suplidore::find($id);
        $suplidor->delete();
        return redirect()->route('admin.suplidor',compact('suplidor'))->with('Info','Se Elimino el Suplidor correctamente');
    }
}
