<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Machine;

class MachineController extends Controller
{
    /**
     * Despliega la lista de maquinas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response(Machine::getAll(), 200);
    }

    /**
     * Almacena una maquina con sus respectivos datos.
     * Los parmatetros OBLIGATORIOS deben ser name:text, description:text
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  text  name
     * @param  text  description
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $machine = Machine::validateAndSave($request->all());
      return response($machine, 200);
    }

    /**
     * Despliega la maquina especificada por ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return response(Machine::getOne($id), 200);
    }

    /**
     * Actualiza los datos de una maquina especificada por ID.
     * Los parmatetros OPCIONALES pueden ser name:text, description:text
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  text  name
     * @param  text  description
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $machine = Machine::validateAndUpdate($request->all(), $id);
      return response($machine, 200);
    }

    /**
     * Destruye la maquina especificado por ID y su informacion anidada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Machine::deleteOne($id);
      return response('ok',200);
    }
}
