<?php
require_once(__DIR__ . '/CF_Field.php');
require_once(__DIR__ . '/CF_Render.php');
require_once(__DIR__ . '/CF_Valid.php');

class CF
{
  private $config = [];
  private $fields = [];
  private $address = [];

  public function __construct( array $args = array() )
  {
    $this->config = $args += array(
      'mail_on'   => false,
      'reply_on'  => false,
      'prefix'    => '',
		);

    $this->address['admin'] = defined('ADMIN_MAIL') ? ADMIN_MAIL : false;
    $this->address['reply'] = defined('REPLY_MAIL') ? REPLY_MAIL : false;
  }

  public function __get( $name )
  {
    return isset($this->$name) ? $this->$name : null;
  }

  public function add_field( $name, array $args = array() )
  {
    $field = new CF_Field( $name, $this, $args );
    return $this->fields[$name] = $field;
  }

  public function get_fields()
  {
    foreach($this->fields as $key => $value) {
      $fields[] = $key;
    }
    return $fields;
  }

  public function render( $name )
  {
    //$fields = array_intersect_key($this->fields, array_flip(func_get_args()));
    return new CF_Render( $name, $this->fields[$name] );
  }
}
