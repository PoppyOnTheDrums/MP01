<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;
use Illuminate\Support\Facades\File;

class ProductosCrudController extends Controller
{
    //Este metodo vizualisa el formulario para crear producto

    public function create()
    {
        return view('admin.productocrear');
    }

    //Este metodo crea el registro en la base de datos

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
         
         return redirect()->route('admin.productos',compact('producto'))->with('Info','Se Agrego el Producto correctamente');
        
    }

    //Este metodo muestra el formulario para editar

    public function edit(producto $producto)
    {
        return view('admin.productoeditar', compact('producto'));
    }

    //Este metodo actualiza el registro de la base de datos

  
    public function update(Request $request, int $id)
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
    
         
        return redirect()->route('admin.productos',compact('producto'))->with('Info','Se Actualizo el Producto correctamente');
    }

    //Este metodo borra el registro de la base de datos

    public function destroy(Request $request,int $id)
    {
        $producto = producto::find($id);
        $destination = 'uploads/productos/'.$producto->foto;
        if (File::exists($destination)) {
            # code...
            File::delete($destination);
        }
        $producto->delete();
        return redirect()->route('admin.productos',compact('producto'))->with('Info','Se Elimino el Producto correctamente');
    }
}
