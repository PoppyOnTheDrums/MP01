<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\egresado;
use Illuminate\Support\Facades\Auth;

class EgresadoFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $egresado = new egresado();
        $user_id = Auth::user()->id;


        if (egresado::find($user_id)) {
            $user_id = Auth::user()->id;
            $egresado = egresado::find($user_id);

            return view('app.egresadoedit', compact('egresado'));
        } else {
            return view('app.egresado');
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
        $egresado = new egresado();

        $user_id = Auth::user()->id;

        if ($request->licencia) {
            $egresado->licencia = $request->licencia;
        }
        if ($request->vehiculo) {
            $egresado->vehiculo = $request->vehiculo;
        }

        $egresado->user_id = $user_id;
        $egresado->graduacion = $request->graduacion;
        $egresado->institucion_educativa = $request->institucion_educativa;
        $egresado->curso = $request->curso;
        $egresado->matricula = $request->matricula;
        $egresado->cedula = $request->cedula;
        $egresado->carrera_tecnica = $request->carrera_tecnica;
        $egresado->tecnico_basico = $request->tecnico_basico;
        $egresado->nombre = $request->nombre;
        $egresado->apellido = $request->apellido;
        $egresado->fecha_nac = $request->fecha_nac;
        $egresado->sexo = $request->sexo;
        $egresado->direccion = $request->direccion;
        $egresado->sector = $request->sector;
        $egresado->seccion = $request->seccion;
        $egresado->municipio = $request->municipio;
        $egresado->provincia = $request->provincia;
        $egresado->pais_nacionalidad = $request->pais_nacionalidad;
        $egresado->telefono_recidencial = $request->telefono_recidencial;
        $egresado->telefono_movil = $request->telefono_movil;
        $egresado->email = $request->email;


        $egresado->save();

        return redirect()->route('app.home');
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
        $egresado = egresado::find($user_id);

        if ($request->licencia) {
            $egresado->licencia = $request->licencia;
        }
        if ($request->vehiculo) {
            $egresado->vehiculo = $request->vehiculo;
        }

        $egresado->user_id = $user_id;
        $egresado->graduacion = $request->graduacion;
        $egresado->institucion_educativa = $request->institucion_educativa;
        $egresado->curso = $request->curso;
        $egresado->matricula = $request->matricula;
        $egresado->cedula = $request->cedula;
        $egresado->carrera_tecnica = $request->carrera_tecnica;
        $egresado->tecnico_basico = $request->tecnico_basico;
        $egresado->nombre = $request->nombre;
        $egresado->apellido = $request->apellido;
        $egresado->fecha_nac = $request->fecha_nac;
        $egresado->sexo = $request->sexo;
        $egresado->direccion = $request->direccion;
        $egresado->sector = $request->sector;
        $egresado->seccion = $request->seccion;
        $egresado->municipio = $request->municipio;
        $egresado->provincia = $request->provincia;
        $egresado->pais_nacionalidad = $request->pais_nacionalidad;
        $egresado->telefono_recidencial = $request->telefono_recidencial;
        $egresado->telefono_movil = $request->telefono_movil;
        $egresado->email = $request->email;

        $egresado->update();

        return redirect()->route('app.egresadoform');
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
