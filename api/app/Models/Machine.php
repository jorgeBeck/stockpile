<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Valida;
use Exception;

class Machine extends Model
{
    protected $table = 'machines';

    public static $valida_data = ['name','description'];

    //----------------- CRUD

    public static function getAll()
    {
      return Machine::get();
    }

    public static function getOne($id)
    {
      return Machine::find($id);
    }

    public static function validateAndSave($array)
    {
      Valida::check($array,Machine::$valida_data);
      try {
        $machine = new Machine;
        $machine->name = $array['name'];
        $machine->description = $array['description'];
        $machine->save();
        return $machine;
      } catch (Exception $e) {
        header('Status: 400');
        die($e->getMessage());
      }
    }

    public static function validateAndUpdate($array, $id)
    {
      try {
        $machine = Machine::find($id);
        isset($array['name']) ? $machine->name = $array['name'] : '' ;
        isset($array['description']) ? $machine->description = $array['description'] : '' ;
        $machine->save();
        return $machine;
      } catch (Exception $e) {
        header('Status: 400');
        die($e->getMessage());
      }
    }

    public static function deleteOne($id)
    {
      try {
        Machine::destroy($id);
        return true;
      } catch (Exception $e) {
        header('Status: 400');
        die($e->getMessage());
      }
    }
}
