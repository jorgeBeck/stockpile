<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Valida;
use Exception;

class Entry extends Model
{
    protected $table = "entries";

    public static $valida_data = ['item_id','machine_id','description','quantity'];

    //----------------- RELATIONS

    public function item()
    {
      return $this->belongsTo('App\Models\Item');
    }

    public function machine()
    {
      return $this->belongsTo('App\Models\Machine');
    }

    //----------------- CRUD

    public static function getAll()
    {
      return Entry::get();
    }

    public static function getOne($id)
    {
      return Entry::with('item','machine')->find($id);
    }

    public static function validateAndSave($array)
    {
      Valida::check($array, Entry::$valida_data, 'Campos incompletos en alguna entrada');
      try {
        $entry = new Entry;
        $entry->entry_id = $array['entry_id'];
        $entry->item_id = $array['item_id'];
        $entry->machine_id = $array['machine_id'];
        $entry->description = $array['description'];
        $entry->quantity = $array['quantity'];
        $entry->save();
        Item::updateQuantity($array['item_id'],$array['quantity']);
        return $entry;
      } catch (Exception $e) {
        header('Status: 400');
        die($e->getMessage());
      }
    }

    public static function validateAndUpdate($array, $id)
    {
      try {
        $entry = Entry::find($id);
        isset($array['name']) ? $entry->name = $array['name'] : '' ;
        isset($array['description']) ? $entry->description = $array['description'] : '' ;
        $entry->save();
        return $entry;
      } catch (Exception $e) {
        header('Status: 400');
        die($e->getMessage());
      }
    }

    public static function deleteOne($id)
    {
      try {
        Entry::destroy($id);
        return true;
      } catch (Exception $e) {
        header('Status: 400');
        die($e->getMessage());
      }
    }

}
