<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\egresado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EgresadoController extends Controller
{
    public function index(){
        
        $search = request()->query('query');



        if ($search){

            $data = egresado::where('nombre',  'LIKE', '%' . $search . '%')
            ->orWhere('user_id',  'LIKE', '%' . $search . '%')
            ->orWhere('carrera_tecnica',  'LIKE', '%' . $search . '%')->paginate(3);
    
        } else {

            $data = egresado::paginate(3);

        }


        return view('admin.egresados',compact('data'));
    }

    public function show(int $id){

        $egresado = egresado::find($id);


        return view('admin.egresadoinfo',compact('egresado'));


    }
    
}
