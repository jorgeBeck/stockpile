<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Valida;
use Exception;

class EntryList extends Model
{
  protected $table = "entries_list";

  public static $valida_data = ['turn','entries'];

  //----------------- RELATIONS

  public function entry()
  {
    return $this->hasMany('App\Models\Entry','entry_id');
  }

  //----------------- CRUD

  public static function getAll()
  {
    return EntryList::with('entry','entry.item','entry.machine')->get();
  }

  public static function getOne($id)
  {
    return EntryList::with('entry','entry.item','entry.machine')->find($id);
  }

  public static function validateAndSave($array)
  {
    Valida::check($array,EntryList::$valida_data);
    foreach ($array['entries'] as $entry_list) {
      Valida::check($entry_list,Entry::$valida_data, 'Campos incompletos en entradas');
    }
    try {
      $entry_list = new EntryList;
      $entry_list->turn = $array['turn'];
      isset($array['comment']) ? $entry_list->comment = $array['comment'] : '' ;
      $entry_list->save();
      $i = 0;
      foreach ($array['entries'] as $entry) {
        $entry['entry_id'] = $entry_list->id;
        $returned_entry = Entry::validateAndSave($entry);
        $entry_list->entry[$i] = $returned_entry; $i++;
      }
      return $entry_list;
    } catch (Exception $e) {
      header('Status: 400');
      die($e->getMessage());
    }
  }

  public static function validateAndUpdate($array, $id)
  {
    try {
      $entry_list = EntryList::find($id);
      isset($array['name']) ? $entry_list->name = $array['name'] : '' ;
      isset($array['description']) ? $entry_list->description = $array['description'] : '' ;
      $entry_list->save();
      return $entry_list;
    } catch (Exception $e) {
      header('Status: 400');
      die($e->getMessage());
    }
  }

  public static function deleteOne($id)
  {
    try {
      EntryList::destroy($id);
      return true;
    } catch (Exception $e) {
      header('Status: 400');
      die($e->getMessage());
    }

  }
}

// 5157510506
