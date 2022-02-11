<?php

namespace App\Http\Controllers;

use App\Models\egresado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\empresa;
use App\Models\User;
use App\Models\vacante;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Pagination\Paginator;

class VacanteController extends Controller
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
        $empresa = empresa::where('user_id', $user_id)->first();

        if (empresa::where('user_id', $user_id)->exists()) {

            $empresa_id = $empresa->id;
            $data = vacante::where('empresa_id', '=', $empresa_id)->paginate(5);


            return view('app.vacante', compact('data'));
        } else {

            return redirect(route('app.home'))->with('message', 'La vacante se creo correctamente!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $empresa = new empresa();
        $user_id = Auth::user()->id;

        if (empresa::where('user_id', $user_id)->exists()) {

            return view('app.vacantecreate');;
        } else {

            return view('app.home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'puesto' => 'required',
            'perfi_puesto' => 'required',
            'sueldo' => 'required',
            'ubicacion' => 'required',
            'tipo_contrato' => 'required',
            'horario' => 'required',
            'correro_curriculum' => 'required',
            'telefono' => 'required',
            'persona_contacto' => 'required',


        ]);
        $vacante = new vacante();
        $empresa = new empresa();
        $user_id = Auth::user()->id;
        $empresa = empresa::where('user_id', $user_id)->first();

        $nombre = $empresa->nombre;
        $id = $empresa->id;

        $vacante->empresa_id = $id;
        $vacante->nombre = $nombre;
        $vacante->puesto = $request->puesto;
        $vacante->perfi_puesto = $request->perfi_puesto;
        $vacante->sueldo = $request->sueldo;
        $vacante->ubicacion = $request->ubicacion;
        $vacante->tipo_contrato = $request->tipo_contrato;
        $vacante->horario = $request->horario;
        $vacante->correro_curriculum = $request->correro_curriculum;
        $vacante->telefono = $request->telefono;
        $vacante->persona_contacto = $request->persona_contacto;

        $vacante->save();

        return redirect()->back()->with('message', 'La vacante se creo correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = vacante::where('estado', '=', 'abierta')->paginate(5);

        return view('app.vacanteshow', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(vacante $vacante)
    {
        return view('app.vacanteedit', compact('vacante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {

        $vacante =  vacante::find($id);
        $user_id = Auth::user()->id;
        $busqueda = $request->user_id;

        $request->validate([

            'puesto' => 'required',
            'perfi_puesto' => 'required',
            'sueldo' => 'required',
            'ubicacion' => 'required',
            'tipo_contrato' => 'required',
            'horario' => 'required',
            'correro_curriculum' => 'required',
            'telefono' => 'required',
            'persona_contacto' => 'required',
            'estado' => 'required',


        ]);

        if ($busqueda) {

            if (egresado::where('id', $busqueda)->exists()) {

                $vacante->puesto = $request->puesto;
                $vacante->perfi_puesto = $request->perfi_puesto;
                $vacante->sueldo = $request->sueldo;
                $vacante->ubicacion = $request->ubicacion;
                $vacante->tipo_contrato = $request->tipo_contrato;
                $vacante->horario = $request->horario;
                $vacante->correro_curriculum = $request->correro_curriculum;
                $vacante->telefono = $request->telefono;
                $vacante->persona_contacto = $request->persona_contacto;
                $vacante->user_id = $request->user_id;
                $vacante->estado = $request->estado;

                $vacante->update();

                return redirect()->back()->with('message', 'La vacante se Actualizo correctamente!');
            } else {
                return redirect()->back()->with('message2', 'El egresado que quiere asignar no existe!');
            }
        } else {

            $vacante->puesto = $request->puesto;
            $vacante->perfi_puesto = $request->perfi_puesto;
            $vacante->sueldo = $request->sueldo;
            $vacante->ubicacion = $request->ubicacion;
            $vacante->tipo_contrato = $request->tipo_contrato;
            $vacante->horario = $request->horario;
            $vacante->correro_curriculum = $request->correro_curriculum;
            $vacante->telefono = $request->telefono;
            $vacante->persona_contacto = $request->persona_contacto;
            $vacante->estado = $request->estado;

            $vacante->update();

            return redirect()->back()->with('message', 'La vacante se Actualizo correctamente!');
        }

        /*        $vacante->puesto = $request->puesto;
        $vacante->perfi_puesto = $request->perfi_puesto;
        $vacante->sueldo = $request->sueldo;
        $vacante->ubicacion = $request->ubicacion;
        $vacante->tipo_contrato = $request->tipo_contrato;
        $vacante->horario = $request->horario;
        $vacante->correro_curriculum = $request->correro_curriculum;
        $vacante->telefono = $request->telefono;
        $vacante->persona_contacto = $request->persona_contacto;
        $vacante->user_id = $request->user_id;

        $vacante->update();

        return redirect()->route('app.home'); */
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
