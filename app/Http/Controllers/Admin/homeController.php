<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{

    //funcion index que retorna la vista de index de el arpatado de administrador
    public function index(){
        return view('admin.index');
    }
    //funcion productos que retorna la vista de productos de el apartado de administrador
    public function productos(){
        return view('admin.productos');
    }
    //funcion usuarios que retorna la vista de usuarios de el apartado de administrador                                                                                                              
    public function user(){
       return view('admin.usuario');
    }
}
