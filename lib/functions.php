<?php
//new CF class
function new_form( array $args = array() )
{
  return new CF($args);
}

//get_parts
function get_header()
{
  include(__DIR__ . '/../parts/header.php');
}

function get_footer()
{
  include(__DIR__ . '/../parts/footer.php');
}


//html escape
function h( $str )
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//dump
function _dump( $obj = NULL )
{
  echo '<pre>', PHP_EOL;
  var_dump($obj);
  echo '</pre>', PHP_EOL;
}
