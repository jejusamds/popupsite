<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Parser extends CI_Parser {

  private $_vars = array();

  //기본적으로 VIEW에서 사용될 변수 지정
  function  __construct() {

    parent::__construct();
    $this->set_vars('BASE_URL', base_url());
    $this->set_vars('SITE_URL', site_url('/'));
    $this->set_vars('CURRENT_URL', current_url());
  }

  function set_vars($key, $val=''){

    if (!is_array($key)) {
      $var = array($key => $val);
    } else {
      $var = $key;
    }

    $this->_vars = array_merge($this->_vars, $var);
  }

  function get_vars($key){

    foreach($_vars as $k => $v){
      if($k == $key){
        return $v;
      }
    }

    return "";
  }

  function parse($template, $data=array(), $return = FALSE) {
    return parent::parse($template, array_merge($this->_vars, $data), $return);
  }
}
