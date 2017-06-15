<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Entry;

class EntryController extends Controller
{
    /**
     * Entrega una lista de los items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response(Entry::getAll(), 200);
    }

    /**
     * Una entrada individual no se pueden insertar directamente desde aqui, se debe hacer
     * por medio de EntryListController::create() por medio de un array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Entrega el item especificado por ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(Entry::getOne($id), 200);
    }

    /**
     * Una entrada individual no se pueden actualizar directamente desde aqui, se debe hacer
     * por medio de EntryListController::update() por medio de un array.
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
     * Una entrada individual no se pueden destruir directamente desde aqui, se debe hacer
     * por medio de EntryListController::destroy() por medio de un array.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
