<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* User
* @functions  login
*/
class User extends CI_Controller {

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

    $this->load->model('popup_model');
    $this->load->library('encrypt');
  }
  
  function manage_login(){

    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    if(!empty($_POST)){

      $usr_id     = !empty($_POST['usr_id'])     ? $_POST['usr_id'] : "";
      $usr_passwd = !empty($_POST['usr_passwd']) ? $_POST['usr_passwd'] : "";

      if(empty($usr_id)){
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '아이디를 입력하세요.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }

      if(empty($usr_passwd)){
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '패스워드를 입력하세요.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }

      if($tpl_vars['ERROR'] == ''){
        $usr_data = $this->user_model->get_usr_info('row', '*', $usr_id);

        if(empty($usr_data)){
          $tpl_vars['ERROR'] = 'WA';
          $tpl_vars['ERROR_MESSAGE'] = '사용자 정보가 없거나, 패스워드가 맞지 않습니다.';
          $this->parser->parse('errors/alert', $tpl_vars);
        } else {

          if($this->encrypt->decode($usr_data['usr_passwd']) != $usr_passwd) {
            $tpl_vars['ERROR'] = 'WA';
            $tpl_vars['ERROR_MESSAGE'] = '사용자 정보가 없거나, 패스워드가 맞지 않습니다.';
            $this->parser->parse('errors/alert', $tpl_vars);
          } else {
            $this->session->set_userdata('logined_usr_id', $usr_id);
            redirect("manager/main/index");
          }
        }
      }
    }

    $this->parser->parse("user/login", $tpl_vars);
  }

  function manage_change_passwd(){

    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    if(!empty($_POST)){

      $passwd          = !empty($_POST['passwd'])         ? $_POST['passwd'] : "";
      $new_passwd      = !empty($_POST['new_passwd'])     ? $_POST['new_passwd'] : "";
      $confirm_passwd  = !empty($_POST['confirm_passwd']) ? $_POST['confirm_passwd'] : "";

      if(empty($passwd)){
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '기존의 패스워드를 입력하세요.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }

      if(empty($new_passwd)){
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '새로운 패스워드를 입력하세요.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }

      if(empty($confirm_passwd)){
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '새로운 패스워드를 한번 더 입력하세요.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }

      if($new_passwd != $confirm_passwd){
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '패스워드 확인을 입력하세요.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }


      if($tpl_vars['ERROR'] == ''){

        $usr_data = $this->user_model->get_usr_info('row', '*', L_USR_ID);

        if(empty($usr_data)){
          $tpl_vars['ERROR'] = 'WA';
          $tpl_vars['ERROR_MESSAGE'] = '사용자 정보가 없거나, 패스워드가 맞지 않습니다.';
          $this->parser->parse('errors/alert', $tpl_vars);
        } else {

          if($this->encrypt->decode($usr_data['usr_passwd']) != $passwd) {
            $tpl_vars['ERROR'] = 'WA';
            $tpl_vars['ERROR_MESSAGE'] = '사용자 정보가 없거나, 패스워드가 맞지 않습니다.';
            $this->parser->parse('errors/alert', $tpl_vars);
          } else {

            $_passwd = $this->encrypt->encode($new_passwd);
            $result = $this->user_model->set_passwd($_passwd, L_USR_ID);

            if($result){
              $this->session->set_userdata('logined_usr_id', "");
              $tpl_vars['REDIRECT_URL'] = base_url().'index.php/adm';
              $tpl_vars['ERROR_MESSAGE'] = '패스워드가 정상적으로 변경되었습니다.';
              $this->parser->parse('errors/redirect', $tpl_vars);
            } else {
              $tpl_vars['ERROR'] = 'WA';
              $tpl_vars['ERROR_MESSAGE'] = '데이터베이스의 오류가 발생하였습니다.';
              $this->parser->parse('errors/alert', $tpl_vars);
            }

          }
        }
      }
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("user/change_passwd", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }


  function manage_logout(){
    $this->session->set_userdata('logined_usr_id', "");
    redirect("adm");
  }
}
