<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\egresado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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


        if (egresado::where('user_id', $user_id)->exists()) {
            $user_id = Auth::user()->id;

            $egresado = egresado::where('user_id', '=', $user_id)->first();

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

        $request->validate([

            'graduacion' => 'required',
            'institucion_educativa' => 'required',
            'curso' => 'required',
            'matricula' => 'required',
            'cedula' => 'required',
            'carrera_tecnica' => 'required',
            'tecnico_basico' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nac' => 'required',
            'sexo' => 'required',
            'direccion' => 'required',
            'sector' => 'required',
            'seccion' => 'required',
            'municipio' => 'required',
            'provincia' => 'required',
            'pais_nacionalidad' => 'required',
            'telefono_recidencial' => 'required',
            'telefono_movil' => 'required',
            'email' => 'required',
            'experiencia' => 'required',
            'area_tecnica_trabajo' => 'required',
            'file.*' => 'required|file|mimes:doc,docx,pdf|max:204800',


        ]);

        if ($request->licencia) {
            $egresado->licencia = $request->licencia;
        }
        if ($request->vehiculo) {
            $egresado->vehiculo = $request->vehiculo;
        }
        if($request->file()){

                $file = $request->file('file');
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $file->move('uploads/productos/', $fileName);
                $egresado->file = $fileName;

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
        $egresado->experiencia = $request->experiencia;
        $egresado->area_tecnica_trabajo = $request->area_tecnica_trabajo;


        $egresado->save();

        return redirect()->back()->with('message', 'Tu informacion se agrego correctamente!');
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
        $egresado = egresado::where('user_id', '=', $user_id)->first();
        
        
        $request->validate([

            'file.*' => 'required|file|mimes:doc,docx,pdf|max:204800',
            'graduacion' => 'required',
            'institucion_educativa' => 'required',
            'curso' => 'required',
            'matricula' => 'required',
            'cedula' => 'required',
            'carrera_tecnica' => 'required',
            'tecnico_basico' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nac' => 'required',
            'sexo' => 'required',
            'direccion' => 'required',
            'sector' => 'required',
            'seccion' => 'required',
            'municipio' => 'required',
            'provincia' => 'required',
            'pais_nacionalidad' => 'required',
            'telefono_recidencial' => 'required',
            'telefono_movil' => 'required',
            'email' => 'required',
            'experiencia' => 'required',
            'area_tecnica_trabajo' => 'required',


        ]);

 

        if ($request->licencia) {
            $egresado->licencia = $request->licencia;
        }
        if ($request->vehiculo) {
            $egresado->vehiculo = $request->vehiculo;
        }

        if ($request->hasFile('file')) { 
    
            $destination = 'uploads/productos/'.$egresado->file;
            if (file::exists($destination)) 
            {
                file::delete($destination);
            }
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/productos/', $filename);
            $egresado->file = $filename;
            
            
        }


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
        $egresado->experiencia = $request->experiencia;
        $egresado->area_tecnica_trabajo = $request->area_tecnica_trabajo;

        $egresado->update();

        return redirect()->back()->with('message', 'Tu informacion se actualizo correctamente!');
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
