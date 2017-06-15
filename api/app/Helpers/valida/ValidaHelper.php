<?php

namespace App\Helpers\valida;

use Illuminate\Http\Response;

class ValidaHelper
{

  public function check($data,$rules,$error='Campos incomlpetos')
  {
    $data = array_filter($data);
    foreach ($rules as $rule) {
      if(!array_key_exists($rule, $data)){
        header('Status: 400');
        die($error);
      }
    }
    return true;
  }

}
