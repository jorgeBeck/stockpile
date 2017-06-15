<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Valida;
use Exception;

class Item extends Model
{
    protected $table = "items";

    public static $valida_data = ['name','photo','description','in_stock','minimum_limit','minimum'];

    //----------------- CRUD

    public static function getAll()
    {
      return Item::get();
    }

    public static function getOne($id)
    {
      return Item::find($id);
    }

    public static function validateAndSave($array)
    {
      Valida::check($array,Item::$valida_data);
      try {
        $item = new Item;
        $item->name = $array['name'];
        $item->photo = $array['photo'];
        $item->description = $array['description'];
        $item->in_stock = $array['in_stock'];
        $item->minimum_limit = $array['minimum_limit'];
        $item->minimum = $array['minimum'];
        isset($array['maximum']) ? $item->maximum = $array['maximum'] : '';
        $item->save();
        return $item;
      } catch (Exception $e) {
        header('Status: 400');
        die($e->getMessage());
      }
    }

    public static function validateAndUpdate($array, $id)
    {
      // Valida::check($array,['name','photo','description','in_stock','minimum_limit','minimum']);
      try {
        $item = Item::find($id);
        isset($array['name']) ? $item->name = $array['name'] : '' ;
        isset($array['photo']) ? $item->photo = $array['photo'] : '' ;
        isset($array['description']) ? $item->description = $array['description'] : '' ;
        isset($array['in_stock']) ? $item->in_stock = $array['in_stock'] : '' ;
        isset($array['minimum_limit']) ? $item->minimum_limit = $array['minimum_limit'] : '' ;
        isset($array['minimum']) ? $item->minimum = $array['minimum'] : '' ;
        isset($array['maximum']) ? $item->maximum = $array['maximum'] : '';
        $item->save();
        return $item;
      } catch (Exception $e) {
        header('Status: 400');
        die($e->getMessage());
      }
    }

    public static function updateQuantity($item_id, $add_quantity)
    {
      try {
        $item = Item::find($item_id);
        $item->in_stock = $item->in_stock + $add_quantity;
        $item->save();
      } catch (Exception $e) {
        header('Status: 400');
        die($e->getMessage());
      }
    }

    public static function deleteOne($id)
    {
      try {
        Item::destroy($id);
        return true;
      } catch (Exception $e) {
        header('Status: 400');
        die($e->getMessage());
      }
    }
}
