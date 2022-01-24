<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\empresa;
use App\Models\vacante;
use Facade\Ignition\QueryRecorder\Query;

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
        $empresa_ = empresa::find($user_id);
        $empresa_id = $empresa_->id;

     

        $vacante = vacante::where('empresa_id', '=', $empresa_id)->get();

        if(empresa::find($user_id)){
            

            return view('app.vacante',compact('vacante'));
   
        }else{

            return view('app.home');

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

        if(empresa::find($user_id)){

            return view('app.vacantecreate');;
   
        }else{

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
        $vacante = new vacante();
        $empresa = new empresa();
        $user_id = Auth::user()->id;
        $empresa = empresa::find($user_id);

        $nombre = $empresa->nombre;
        $id = $empresa->id;
        
        $vacante->empresa_id = $id;
        $vacante->nombre = $nombre; 
        $vacante->user_id = $user_id;
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

        $vacante->puesto = $request->puesto;
        $vacante->perfi_puesto = $request->perfi_puesto;
        $vacante->sueldo = $request->sueldo;
        $vacante->ubicacion = $request->ubicacion;
        $vacante->tipo_contrato = $request->tipo_contrato;
        $vacante->horario = $request->horario;
        $vacante->correro_curriculum = $request->correro_curriculum;
        $vacante->telefono = $request->telefono;
        $vacante->persona_contacto = $request->persona_contacto;

        $vacante->update();

        return redirect()->route('app.home');
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
