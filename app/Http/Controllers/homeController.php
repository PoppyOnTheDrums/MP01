<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;


class homeController extends Controller
{

    //funcion index que retorna la vista de index de el arpatado de administrador
    public function index(){
        return view('admin.index');
    }
    //funcion productos que retorna la vista de productos de el apartado de administrador
    public function productos(){
        
        $producto = producto::all();
        
        return view('admin.producto',compact('producto'));
    }
    //funcion usuarios que retorna la vista de usuarios de el apartado de administrador                                                                                                              
    public function user(){
        return view('admin.userindex');
    }

    public function show(){
        return view('app.home'); 
    
    }
}
