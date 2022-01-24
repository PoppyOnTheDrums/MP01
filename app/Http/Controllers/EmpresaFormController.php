<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = new empresa();
        $user_id = Auth::user()->id;


        if (empresa::find($user_id)) {
            $user_id = Auth::user()->id;
            $empresa = empresa::find($user_id);

            return view('app.empresaedit', compact('empresa'));
        } else {
            return view('app.empresa');
        }
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
        $empresa = new empresa();

        $user_id = Auth::user()->id;


        $empresa->user_id = $user_id;
        $empresa->nombre = $request->nombre;
        $empresa->rnc = $request->rnc;
        $empresa->visibilidad = $request->visibilidad;
        $empresa->dp_formacion = $request->dp_formacion;
        $empresa->alcance = $request->alcance;
        $empresa->actividad_economica = $request->actividad_economica;
        $empresa->industria = $request->industria;
        $empresa->tamano = $request->tamano;
        $empresa->direccion = $request->direccion;
        $empresa->sector = $request->sector;
        $empresa->seccion = $request->seccion;
        $empresa->municipio = $request->municipio;
        $empresa->provincia = $request->provincia;
        $empresa->pais = $request->pais;
        $empresa->telefono_principal = $request->telefono_principal;
        $empresa->telefono_directo = $request->telefono_directo;

        $empresa->save();

        return redirect()->route('app.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = Auth::user()->id;
        $empresa = empresa::find($user_id);

        return view('app.empresaedit', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $empresa = empresa::find($user_id);

        $empresa->nombre = $request->nombre;
        $empresa->rnc = $request->rnc;
        $empresa->visibilidad = $request->visibilidad;
        $empresa->dp_formacion = $request->dp_formacion;
        $empresa->alcance = $request->alcance;
        $empresa->actividad_economica = $request->actividad_economica;
        $empresa->industria = $request->industria;
        $empresa->tamano = $request->tamano;
        $empresa->direccion = $request->direccion;
        $empresa->sector = $request->sector;
        $empresa->seccion = $request->seccion;
        $empresa->municipio = $request->municipio;
        $empresa->provincia = $request->provincia;
        $empresa->pais = $request->pais;
        $empresa->telefono_principal = $request->telefono_principal;
        $empresa->telefono_directo = $request->telefono_directo;

        $empresa->update();

        return redirect()->route('app.empresaform');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
