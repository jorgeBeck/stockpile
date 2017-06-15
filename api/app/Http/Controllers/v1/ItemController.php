<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Despliega la lista de items e informacion anidada.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response(Item::getAll(), 200);
    }

    /**
     * Almacena un item con sus respectivos datos.
     * Los parmatetros OBLIGATORIOS deben ser name:text, photo:text,
     * description:text, in_stock:int, minimum_limit:int, minimum:int
     * OPCIONALMENTE acepta maximum:int
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  text  name
     * @param  text  photo
     * @param  text  description
     * @param  int  in_stock
     * @param  int  minimum_limit
     * @param  int  minimum
     * @param  int  maximum
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $item = Item::validateAndSave($request->all());
      return response($item, 200);
    }

    /**
     * Despliega el item especificado por ID y su informacion anidada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(Item::getOne($id), 200);
    }

    /**
    * Actualiza un item con sus respectivos datos.
    * Los parmatetros OPCIONALES pueden ser name:text, photo:text,
    * description:text, in_stock:int, minimum_limit:int, minimum:int, maximum:int
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  text  name
    * @param  text  photo
    * @param  text  description
    * @param  int  in_stock
    * @param  int  minimum_limit
    * @param  int  minimum
    * @param  int  maximum
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $item = Item::validateAndUpdate($request->all(), $id);
      return response($item, 200);
    }

    /**
     * Destruye el item especificado por ID y su informacion anidada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::deleteOne($id);
        return response('ok',200);
    }
}
