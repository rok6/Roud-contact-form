<?php

class CF_Valid
{
  public static function valid( $val, $f )
  {
    if( method_exists($this, $f) ) {

      if( !$val = $this->$f($val) ) {
        //
      }

    }
    else if( is_array($val) ){
      $val = (array)array_map('filter_var', $val);
    }
    else {
      $val = (string)filter_var($val);
    }

    return $val;
  }

  private function required()
  {

  }

  private function text()
  {

  }

  private function email()
  {

  }
}
