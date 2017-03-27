<?php

class CF_Render
{
  public function __construct( $name, $field )
  {
    $this->meta = $field->meta;
    $this->val = $field->val;
    $this->handle( $name, $this->meta['type'] );
  }

  private function build( $tag, array $attrs = array(), $content = null )
  {
    $attributes = '';

    foreach( $attrs as $attr => $value ) {
      if( is_bool($value) && $value ) {
        $attributes .= " $attr";
      }
      else if( $value !== false ){
        $attributes .= " $attr=\"$value\"";
      }
    }

    return ($content === null) ? "<$tag$attributes />" : "<$tag$attributes>$content</$tag>";
  }

  private function handle( $name, $f )
  {
    if( method_exists($this, $f) ) {
      echo $this->$f( $name ), PHP_EOL;
    }
  }

  private function text()
  {
    $meta = $this->meta;

    $label = $this->build('span', array(
      'class'  => 'label-name',
    ), $meta['label']);

    $field = $this->build('input', array(
      'type'  => 'text',
      'id'  => $meta['id'],
      'name'  => $meta['name'],
      'default'  => ($meta['default'] !== '') ? $meta['default'] : false,
      'placeholder'  => ($meta['placeholder'] !== '') ? $meta['placeholder'] : false,
    ));

    return $this->build('label', array(), $label . $field);
  }

  private function email()
  {
    $meta = $this->meta;

    $label = $this->build('span', array(
      'class'  => 'label-name',
    ), $meta['label']);

    $field = $this->build('input', array(
      'type'  => 'email',
      'id'  => $meta['id'],
      'name'  => $meta['name'],
      'default'  => ($meta['default'] !== '') ? $meta['default'] : false,
      'placeholder'  => ($meta['placeholder'] !== '') ? $meta['placeholder'] : false,
    ));

    return $this->build('label', array(), $label . $field);
  }

}
