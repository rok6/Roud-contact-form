<?php

class CF_Field
{
  public function __construct( $name, CF $form, array $args = array() )
  {
    $this->meta = $args += array(
      'type'        => 'text',
      'label'       => '',
      'placeholder' => '',
      'default'     => '',
      'rules'       => [],
    );

    //name, id をセット
    $this->meta['name'] = $this->meta['id'] = $form->config['prefix'] . $name;

    //type から valid rule を追加
    if( !in_array($this->meta['type'], $this->meta['rules'], true) ) {
      $this->meta['rules'][] = $this->meta['type'];
    }

    //値のセット
    $this->set_val();
  }

  private function set_val()
  {
    $this->val = '';
    $name = $this->meta['name'];

    if( 'POST' !== $_SERVER['REQUEST_METHOD'] || !isset($_POST[$name]) ) {
      return;
    }

    foreach( $this->meta['rules'] as $f ) {
      CF_Valid::valid( $_POST[$name], $f );
    }

  }
}
