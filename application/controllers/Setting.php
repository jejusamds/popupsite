<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Setting
* @functions  index
*/
class Setting extends CI_Controller {

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

    $this->load->model('setting_model');
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

      $email         = !empty($_POST['email'])         ? $_POST['email']         : "";
      $title_ko      = !empty($_POST['title_ko'])      ? $_POST['title_ko']      : "";
      $name_ko       = !empty($_POST['name_ko'])       ? $_POST['name_ko']       : "";
      $address_ko    = !empty($_POST['address_ko'])    ? $_POST['address_ko']    : "";
      $title_en      = !empty($_POST['title_en'])      ? $_POST['title_en']      : "";
      $name_en       = !empty($_POST['name_en'])       ? $_POST['name_en']       : "";
      $address_en    = !empty($_POST['address_en'])    ? $_POST['address_en']    : "";
      $description   = !empty($_POST['description'])   ? $_POST['description']   : "";
      $keyword       = !empty($_POST['keyword'])       ? $_POST['keyword']       : "";
      $owner         = !empty($_POST['owner'])         ? $_POST['owner']         : "";
      $regist_num    = !empty($_POST['regist_num'])    ? $_POST['regist_num']    : "";
      $tel1_num      = !empty($_POST['tel1_num'])      ? $_POST['tel1_num']      : "";
      $tel2_num      = !empty($_POST['tel2_num'])      ? $_POST['tel2_num']      : "";
      $tel3_num      = !empty($_POST['tel3_num'])      ? $_POST['tel3_num']      : "";
      $tel4_num      = !empty($_POST['tel4_num'])      ? $_POST['tel4_num']      : "";
      $tel5_num      = !empty($_POST['tel5_num'])      ? $_POST['tel5_num']      : "";

      $result = $this->setting_model->set_settings($title_ko, $name_ko, $address_ko,
                                 $title_en, $name_en, $address_en,$email, $owner, $regist_num,
                                 $tel1_num, $tel2_num, $tel3_num, $tel4_num, $tel5_num, $fax_num,
                                 $email, $keyword, $description);

      if($result){
        $tpl_vars['REDIRECT_URL']  = current_url();
        $tpl_vars['ERROR_MESSAGE'] = "저장되었습니다.";
        $this->parser->parse("errors/redirect", $tpl_vars);
      } else {
        $tpl_vars['ERROR_MESSAGE'] = "데이터베이스의 오류가 발생하였습니다.";
        $this->parser->parse("errors/alert", $tpl_vars);
      }
    }
    
    $setting_data = $this->setting_model->get_settings();
    $setting_data = array_change_key_case($setting_data, CASE_UPPER);

    $tpl_vars     = array_merge($setting_data, $tpl_vars);

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("setting/index", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }
}
