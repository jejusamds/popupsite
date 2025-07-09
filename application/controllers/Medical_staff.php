<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical_staff extends CI_Controller {

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

    $this->load->model("medical_staff_model");
  }

  public function manage_index($type = '-', $value = '-', $offset = '0') {

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $this->load->library('pagination');
    $per_page          = 20;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    if (!empty ($_POST['checked'])) {
      $result = $this->medical_staff_model->delete_medical_staff($_POST['checked']);
      if($result){
        $tpl_vars['REDIRECT_URL'] = current_url();
        $tpl_vars['ERROR_MESSAGE'] = '삭제되었습니다.';
        $this->parser->parse('errors/redirect', $tpl_vars);
      } else {
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '데이터베이스의 오류가 발생하였습니다.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }
    }

    $pagination_config['base_url'] = site_url('manager/medical_staff/index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->medical_staff_model->paging($offset, $per_page, 'Y', $type, $value);
    $rows    = $data['rows'];
    $numrows = $data['numrows'];

    //pagination config
    $pagination_config['total_rows']     = $numrows;
    $pagination_config['uri_segment']    = 6;
    $pagination_config['num_links']      = 5;
    $pagination_config['per_page']       = $per_page;
    $pagination_config['full_tag_open']  = '<div class="paging mt20"><div class="p_wrap">';
    $pagination_config['full_tag_close'] = '</div></div>';
    $this->pagination->initialize($pagination_config);

    if(empty($rows)){
      $tpl_vars['EMPTY'] = "<tr><td colspan='6' style='text-align:center;'>등록된 글이 없습니다.</td></tr>";
    } else {
      $tpl_vars['EMPTY'] = "";
    }

    $tpl_vars['ROWS']         = $rows;
    $tpl_vars['SEARCH_VALUE'] = $value;
    $tpl_vars['PAGINATION']   = $this->pagination->create_links();
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'ms_name';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("medical_staff/index", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }

  public function manage_write($ms_id = ""){ 

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    $ms_part           = empty($_POST['ms_part'])            ? "" : $_POST['ms_part'];
    $ms_name           = empty($_POST['ms_name'])        ? "" : $_POST['ms_name'];
    $ms_rank           = empty($_POST['ms_rank']) ? "" : $_POST['ms_rank'];
    $ms_history        = empty($_POST['ms_history'])            ? "" : $_POST['ms_history'];

    $tpl_vars['MS_ID']      = '';
    $tpl_vars['MS_PART']    = '';
    $tpl_vars['MS_NAME']    = '';
    $tpl_vars['MS_RANK']    = '';
    $tpl_vars['MS_HISTORY'] = '';

    if(!empty($_POST)){

      if(empty($ms_part)){
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "대분류를 선택하세요.";
      }

      if(empty($ms_name)){
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "기본 항목을 입력해주세요.";
      }

      if(empty($tpl_vars['ERROR'])) {
        $result = $this->medical_staff_model->set_medical_staff($ms_id, $ms_part, $ms_name, $ms_rank, $ms_history, L_USR_ID);
        if($result){
          $tpl_vars['REDIRECT_URL'] = base_url()."index.php/manager/medical_staff/index";
          $tpl_vars['ERROR_MESSAGE'] = "저장되었습니다.";
          $this->parser->parse('errors/redirect', $tpl_vars);
        } else {
          $tpl_vars['ERROR'] = "WA";
          $tpl_vars['ERROR_MESSAGE'] = "데이터베이스에서 오류가 발생하였습니다.";
        }
      }
    } else {
      if(!empty($ms_id)){
        $rows = $this->medical_staff_model->get_medical_staff('row', '*', $ms_id);
        $rows = array_change_key_case($rows, CASE_UPPER);
        $tpl_vars = array_merge($tpl_vars, $rows);
      }
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("medical_staff/write", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);    
  }

  function manage_view($ms_id){

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = array();

    if(empty($ms_id)){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
    } else {
      $rows = $this->medical_staff_model->get_medical_staff('row', '*', $ms_id);
      $rows = array_change_key_case($rows, CASE_UPPER);
      $rows['MS_HISTORY'] = nl2br($rows['MS_HISTORY']);
      $tpl_vars = array_merge($rows, $tpl_vars);
    }

    $this->parser->parse("layouts/admin/header", $tpl_vars);
    $this->parser->parse("medical_staff/view", $tpl_vars);
    $this->parser->parse("layouts/admin/footer", $tpl_vars);
  }

  function manage_request_delete(){

    if(!defined("L_USR_ID")) {
      redirect("adm/index");
    }

    if(L_USR_ID != 'admin') {
      redirect("adm/index");
    }

    $tpl_vars = array();
    $tpl_vars['ERROR'] = "";
    $tpl_vars['ERROR_MESSAGE'] = "";

    if(empty($_POST['ms_id'])){
      $tpl_vars['ERROR'] = "WA";
      $tpl_vars['ERROR_MESSAGE'] = "잘못된 접근입니다.";
      $this->parser->parse('errors/alert', $tpl_vars);
    } else {
      $result = $this->medical_staff_model->delete_medical_staff($_POST['ms_id']);
      if($result){
        $tpl_vars['ERROR'] = "OK";
        $tpl_vars['ERROR_MESSAGE'] = "삭제되었습니다.";
        $this->parser->parse('errors/empty', array('CONTENTS' => json_encode($tpl_vars)));
      } else {
        $tpl_vars['ERROR'] = "WA";
        $tpl_vars['ERROR_MESSAGE'] = "데이터베이스의 오류가 발생하였습니다.";
        $this->parser->parse('errors/empty', array('CONTENTS' => json_encode($tpl_vars)));
      }
    }
  }

  public function request_index($type = '-', $value = '-', $offset = '0') {

    $this->load->library('pagination');

    $per_page          = PER_PAGE;
    $tpl_vars          = array();
    $tpl_vars['ERROR'] = "";

    if (!empty ($_POST['checked'])) {
      $result = $this->medical_staff_model->delete_medical_staff($_POST['checked']);
      if($result){
        $tpl_vars['REDIRECT_URL'] = current_url();
        $tpl_vars['ERROR_MESSAGE'] = '삭제되었습니다.';
        $this->parser->parse('errors/redirect', $tpl_vars);
      } else {
        $tpl_vars['ERROR'] = 'WA';
        $tpl_vars['ERROR_MESSAGE'] = '데이터베이스의 오류가 발생하였습니다.';
        $this->parser->parse('errors/alert', $tpl_vars);
      }
    }

    $pagination_config['base_url'] = site_url('medical_staff/request_index/'.$type.'/'.$value);

    if($type  == '-')          $type = '';
    if($value == '-')          $value = '';

    $data    = $this->medical_staff_model->paging($offset, $per_page, 'Y', 'medical_staff', $type, $value);
    $rows    = $data['rows'];
    $numrows = $data['numrows'];

    //pagination config
    $pagination_config['total_rows']     = $numrows;
    $pagination_config['uri_segment']    = 5;
    $pagination_config['num_links']      = 5;
    $pagination_config['per_page']       = $per_page;
    $pagination_config['full_tag_open']  = '<div class="paging mt20"><div class="p_wrap">';
    $pagination_config['full_tag_close'] = '</div></div>';
    $this->pagination->initialize($pagination_config);

    if(empty($rows)){
      $tpl_vars['EMPTY'] = "<tr><td colspan='6' style='text-align:center;'>".EMPTY_DATA."</td></tr>";
    } else {
      $tpl_vars['EMPTY'] = "";
    }

    $tpl_vars['ROWS']         = $rows;
    $tpl_vars['SEARCH_VALUE'] = $value;
    $tpl_vars['PAGINATION']   = $this->pagination->create_links();
    if(empty($type))     $tpl_vars['SEARCH_TYPE'] = 'ms_title';
    else                 $tpl_vars['SEARCH_TYPE'] = $type;

    $this->parser->parse("medical_staff/request_index", $tpl_vars);
  }

  function request_view($ms_id = ""){

    $tpl_vars = array();
    $tpl_vars['ERROR'] = array();

    if(empty($ms_id)){
      $tpl_vars['BBS_TITLE'] = "";
      $tpl_vars['BBS_CONTENTS'] = "";
    } else {
      $this->medical_staff_model->set_views($ms_id);
      $rows = $this->medical_staff_model->get_medical_staff('row', '*', $ms_id);

      if(empty($rows)){
        $tpl_vars['BBS_TITLE'] = "";
        $tpl_vars['BBS_CONTENTS'] = "";
      }

      $rows = array_change_key_case($rows, CASE_UPPER);
      $tpl_vars = array_merge($rows, $tpl_vars);
    }

    $this->parser->parse("medical_staff/request_view", $tpl_vars);
  }

}
