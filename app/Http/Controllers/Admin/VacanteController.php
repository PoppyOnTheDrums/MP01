<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\egresado;
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


        return view('admin.vacanteinfo', compact('vacante'));
    }

    public function update(Request $request, int $id)
    {

        $vacante =  vacante::find($id);
        $busqueda = $request->user_id;
    


        if ($busqueda) {

            if (egresado::where('id', $busqueda)->exists()) {


                $vacante->estado = $request->estado;
                $vacante->user_id = $request->user_id;

                $vacante->update();
                return redirect()->back()->with('message', 'La informacion se a actualizado correctamente!');

            } else {
                return redirect()->back()->with('message2', 'El egresado al cual le asigno la vacante no existe!');
            }
        } else {

            $vacante->estado = $request->estado;
            $vacante->update();
            return redirect()->back()->with('message', 'La informacion se a actualizado correctamente!');
        }
    }
}
