<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Professional
* @functions  redirect
* @functions  index
*/
class Professional extends CI_Controller {

  function  __construct() {
    parent::__construct();

    //PHP Setting
    ini_set("max_execution_time", 90000000);
    set_time_limit(0);
    date_default_timezone_set('Asia/Seoul');

    //cache
    header("Content-Type: text/html; charset=UTF-8");
    header('P3P: CP="CAO PSA OUR"');
    header('Cache-Control: no-cache');
    header('Pragma: no-cache');
  }


  public function artificialkidney() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("professional/artificialkidney", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function physiotherapy() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("professional/physiotherapy", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

  public function radiation() {

    $tpl_vars               = array();
    $tpl_vars['ERROR']      = "";

    $this->parser->parse("layouts/common/header", $tpl_vars);
    $this->parser->parse("professional/radiation", $tpl_vars);
    $this->parser->parse("layouts/common/footer", $tpl_vars);
  }

}
