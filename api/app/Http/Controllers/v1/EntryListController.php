<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\EntryList;

class EntryListController extends Controller
{
  /**
   * Despliega la lista de entradas con todo y sus items e informacion anidada.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response(EntryList::getAll(), 200);
  }

  /**
   * Almacena una lista de entrada con un arreglo de items y sus datos.
   * Los parmatetros deben ser turn:text y entries:array obligatoriamente
   * Dentro del array entries, los parametros obligatorios son:
   * item_id:foreign, machine_id:foreign, description:text, quantity:int
   * OPCIONALMENTE acepta comentary:text
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  text  turn
   * @param  text  comentary
   * @param  array  entries
   * @param  int  entries.item_id
   * @param  int  entries.machine_id
   * @param  text  entries.description
   * @param  int  entries.quantity
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $entry_list = EntryList::validateAndSave($request->all());
    return response($entry_list, 200);
  }

  /**
   * Entrega la lista especificada por ID
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return response(EntryList::getOne($id), 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
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
