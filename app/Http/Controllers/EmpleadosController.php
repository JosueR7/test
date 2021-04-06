<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Empleados;
use App\Roles;
use App\Areas;
use App\EmpleadoRol;
use App\RolEmpleado;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = DB::table('empleados')
            ->join('areas','empleados.area_id','=','areas.id')
            ->select('empleados.id','empleados.nombre as nombre','email',DB::raw('CASE sexo WHEN "F" THEN "Femenino"
            WHEN "M" THEN "Masculino" END as sexo'),'areas.nombre as area',DB::raw('CASE boletin WHEN "1" THEN "SI"
            WHEN "0" THEN "NO" END as boletin'),'descripcion')
            ->get();

        return view('empleados', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        $areas = Areas::all();
        return view('nuevoempleado', compact('roles','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('boletin')) {
            $empleado = Empleados::create($request->all());

            $rol = new EmpleadoRol;
            $rol->empleado_id = $empleado->id;
            $rol->rol_id = $request->rol;
            $rol->save();
        } else{
            $empleado = new Empleados;
            $empleado->nombre = $request->nombre;
            $empleado->email = $request->email;
            $empleado->sexo = $request->sexo;
            $empleado->area_id = $request->area_id;
            $request->boletin = 0;
            $empleado->boletin = $request->boletin;
            $empleado->descripcion = $request->descripcion;

            $empleado->save();

            $rol = new EmpleadoRol;
            $rol->empleado_id = $empleado->id;
            $rol->rol_id = $request->rol;
            $rol->save();


        }


        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleados::findOrFail($id);
        $empleado_rol = EmpleadoRol::where('empleado_id','=',$empleado->id)
        ->get();
        $roles = Roles::all();
        $areas = Areas::all();

        return view('editarempleado', compact('empleado','empleado_rol','roles','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empleado = request()->except('_token','_method','rol');
        $rol = request()->only('rol as rol_id');
        //$rol->rol_id = $request->rol;

        if ($request->input('boletin')) {
            Empleados::where('id','=',$id)->update($empleado);
            EmpleadoRol::where('empleado_id','=',$id)->update($rol);

        } else{
            $empleado = new Empleados;
            $empleado->nombre = $request->nombre;
            $empleado->email = $request->email;
            $empleado->sexo = $request->sexo;
            $empleado->area_id = $request->area_id;
            $request->boletin = 0;
            $empleado->boletin = $request->boletin;
            $empleado->descripcion = $request->descripcion;

            $empleado->update();

            $rol = new EmpleadoRol;
            $rol->empleado_id = $empleado->id;
            $rol->rol_id = $request->rol;
            $rol->update();

        }

        $empleado = Empleados::findOrFail($id);
        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleados::destroy($id);
        //EmpleadoRol::destroy($id);

        return redirect()->route('empleado.index');


    }
}
