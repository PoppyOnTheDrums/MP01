<?php

namespace App\Http\Controllers;

use App\Models\detalle_vacante;
use App\Models\egresado;
use App\Models\vacante;
use Illuminate\Http\Request;

class AsignController extends Controller
{
    public function index(vacante $vacante)
    {

        $vacantes = $vacante->id;
        $detalle_v = detalle_vacante::where('vacante_id', '=', $vacantes)->get();

        return view('app.vacanteasign', compact('vacante', 'detalle_v'));
    }
    public function store(Request $request)
    {

        $request->validate([

            'user_id' => 'required',
            'vacante_id' => 'required',

        ]);

        $user_id = $request->user_id;
        $detalle_v = new detalle_vacante();
        $id = $request->vacante_id;
        $busqueda = vacante::where('id', '=', $id)->exists();

        if (detalle_vacante::where('user_id', '=',  $user_id)->where('vacante_id','=',$id)->exists()) {
            return redirect()->back()->with('message4', 'El egresado que quiere asignar no existe!');
        } else {
            if ($busqueda) {

                if (egresado::where('id',  $user_id)->exists()) {

                    $detalle_v->user_id = $request->user_id;
                    $detalle_v->vacante_id = $request->vacante_id;


                    $detalle_v->save();

                    return redirect()->back()->with('message', 'El egresado se Agrego Correctamente!');
                } else {
                    return redirect()->back()->with('message2', 'El egresado que quiere asignar no existe!');
                }
            }
        }
    }

    public function destroy(Request $request, int $id)
    {

        $detalle = detalle_vacante::where('id', '=', $id);

        $detalle->delete();
        return redirect()->back()->with('message3', 'El egresado se elimino correctamente!');
    }
}
