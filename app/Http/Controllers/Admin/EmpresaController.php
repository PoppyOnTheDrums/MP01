<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {

        $search = request()->query('query');



        if ($search) {

            $data = empresa::where('nombre',  'LIKE', '%' . $search . '%')
                ->orWhere('user_id',  'LIKE', '%' . $search . '%')
                ->orWhere('provincia',  'LIKE', '%' . $search . '%')->paginate(5);
        } else {

            $data = empresa::paginate(5);
        }


        return view('admin.empresas', compact('data'));
    }

    public function show(int $id)
    {
        
        $empresa = empresa::find($id);


        return view('admin.empresainfo',compact('empresa'));


    }
}
