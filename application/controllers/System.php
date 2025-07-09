<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* System Controller
* 
* ajax request functions saved_message
* functionss  
*/
class System extends CI_Controller {

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

    $this->load->model("board_model");
  }

  // 기본설정
  function manage_index(){

    if(L_USR_ID == '') {
      die("Access Denied");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = "";

    $settings = $this->setting_model->get_settings();
    $settings = array_change_key_case($settings, CASE_UPPER);
    $tpl_vars = array_merge($settings, $tpl_vars);

    $this->parser->parse("layouts/header", $tpl_vars);
    $this->parser->parse("systems/index", $tpl_vars);
    $this->parser->parse("layouts/footer", $tpl_vars);
  }
}

