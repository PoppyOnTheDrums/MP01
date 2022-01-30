<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    public function index()
    {

        $search = request()->query('query');



        if ($search) {

            $data = vacante::where('nombre',  'LIKE', '%' . $search . '%')
                ->orWhere('empresa_id',  'LIKE', '%' . $search . '%')
                ->orWhere('puesto',  'LIKE', '%' . $search . '%')->paginate(5);
        } else {

            $data = vacante::paginate(5);
        }

        return view('admin.vacantes', compact('data'));
    }

    public function show(int $id)
    {
             
        $vacante = vacante::find($id);


        return view('admin.vacanteinfo',compact('vacante'));

    }

    public function update(Request $request, int $id)
    {
        $vacante =  vacante::find($id);

        $vacante->estado = $request->estado;
        $vacante->user_id = $request->user_id;

        $vacante->update();

        return view('admin.vacanteinfo',compact('vacante'));


    }
}
