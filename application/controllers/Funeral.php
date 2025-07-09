<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Setting
* @functions  index
*/
class Funeral extends CI_Controller {

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

    $this->load->model('funeral_model');
  }

  /*
  * MAIN
  */
  public function manage_index() {

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }
    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = "";

    if(!empty($_POST)){

      $lease_vip_price  = !empty($_POST['lease_vip_price']) ? $_POST['lease_vip_price'] : "";
      $lease_n01_price  = !empty($_POST['lease_n01_price']) ? $_POST['lease_n01_price'] : "";
      $lease_n02_price  = !empty($_POST['lease_n02_price']) ? $_POST['lease_n02_price'] : "";
      $lease_vip_price_per_hour = !empty($_POST['lease_vip_price_per_hour']) ? $_POST['lease_vip_price_per_hour'] : "";
      $lease_n01_price_per_hour = !empty($_POST['lease_n01_price_per_hour']) ? $_POST['lease_n01_price_per_hour'] : "";
      $lease_n02_price_per_hour = !empty($_POST['lease_n02_price_per_hour']) ? $_POST['lease_n02_price_per_hour'] : "";
      $env_vip_price    = !empty($_POST['env_vip_price'])   ? $_POST['env_vip_price']   : "";
      $env_price        = !empty($_POST['env_price'])       ? $_POST['env_price']       : "";
      $immigration      = !empty($_POST['immigration'])     ? $_POST['immigration']     : "";
      $enshrined        = !empty($_POST['enshrined'])       ? $_POST['enshrined']       : "";

      $result = $this->funeral_model->set_funeral($lease_vip_price, $lease_n01_price, $lease_n02_price, $env_vip_price, $env_price, $immigration, $enshrined
                                                    ,$lease_vip_price_per_hour, $lease_n01_price_per_hour, $lease_n02_price_per_hour);

      if($result){
        $tpl_vars['REDIRECT_URL']  = current_url();
        $tpl_vars['ERROR_MESSAGE'] = "저장되었습니다.";
        $this->parser->parse("errors/redirect", $tpl_vars);
      } else {
        $tpl_vars['ERROR_MESSAGE'] = "데이터베이스의 오류가 발생하였습니다.";
        $this->parser->parse("errors/alert", $tpl_vars);
      }
    }
    
    $data    = $this->funeral_model->get_funeral();
    $data    = array_change_key_case($data, CASE_UPPER);

    $tpl_vars     = array_merge($data, $tpl_vars);

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("funeral/index", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }
}
