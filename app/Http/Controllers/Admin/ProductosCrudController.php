<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;
use Illuminate\Support\Facades\File;

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
        
        //compila la tabla producot hace una consuta sql inserta la imagen en la carpeta uploads y redirecciona productos

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
    public function edit(producto $producto)
    {
        return view('admin.edit',compact('producto'));
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
        $producto = producto::find($id);
     
         $producto->nombre = $request->nombre;
         $producto->suplidor = $request->suplidor;
         $producto->descripcion = $request->descripcion;
         $producto->modelo = $request->modelo;
         $producto->categoria = $request->categoria;
         $producto->cantidad = $request->cantidad;
         $producto->precio = $request->precio;
         if ($request->hasFile('file')) { 
 
             $destination = 'uploads/productos/'.$producto->foto;
             if (file::exists($destination)) 
             {
                 file::delete($destination);
             }
             $file = $request->file('file');
             $extention = $file->getClientOriginalExtension();
             $filename = time().'.'.$extention;
             $file->move('uploads/productos/', $filename);
             $producto->foto = $filename;
             
             
         }
 
        
         $producto->update();
     
          
         return redirect()->route('admin.productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,int $id)
    {
        $producto = producto::find($id);
        $destination = 'uploads/productos/'.$producto->foto;
        if (File::exists($destination)) {
            # code...
            File::delete($destination);
        }
        $producto->delete();
        return redirect()->route('admin.productos');
    }
}
